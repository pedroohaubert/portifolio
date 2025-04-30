<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Exibir uma listagem dos projetos.
     */
    public function index(Request $request)
    {
        $query = Project::query();

        // Filtrar por pesquisa de texto nos títulos e descrições
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where(function(Builder $q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filtrar por categoria
        if ($request->has('category') && !empty($request->input('category'))) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function(Builder $q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        // Ordenação (padrão: mais recentes)
        $query->orderBy('created_at', 'desc');

        // Buscar projetos com suas categorias
        $projects = $query->with('categories')->paginate(6);

        // Buscar todas as categorias para filtros
        $categories = Category::all();

        // Renderizar a view de projetos
        return view('projects', compact('projects', 'categories'));
    }

    /**
     * Exibir o formulário para criar um novo projeto.
     */
    public function create()
    {
        $categories = Category::all();
        return view('projects.create', compact('categories'));
    }

    /**
     * Armazenar um novo projeto.
     */
    public function store(ProjectRequest $request)
    {
        // Obtém apenas os dados validados pelo ProjectRequest
        $validatedData = $request->validated();

        // Prepara os dados básicos do projeto
        $projectData = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'link' => $validatedData['link'] ?? null,
        ];

        // Upload de imagem, se fornecida
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($validatedData['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('projects', $imageName, 'public');

            // Adiciona a URL pública da imagem aos dados do projeto
            if ($path) {
                $projectData['image_path'] = Storage::url($path);
            }
        }

        $project = Project::create($projectData);

        // Anexar categorias, se fornecidas e validadas
        if (isset($validatedData['categories']) && is_array($validatedData['categories'])) {
            $project->categories()->attach($validatedData['categories']);
        }

        return redirect()->route('projects.admin')->with('success', 'Projeto criado com sucesso');
    }

    /**
     * Exibir o projeto especificado.
     */
    public function show(Project $project)
    {
        // Carregamos as categorias relacionadas
        $project->load('categories');
        
        return view('projects.show', compact('project'));
    }

    /**
     * Exibir o formulário para editar o projeto especificado.
     */
    public function edit(Project $project)
    {
        $project->load('categories');
        $categories = Category::all();
        
        return view('projects.edit', compact('project', 'categories'));
    }

    /**
     * Atualizar o projeto especificado.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        // Obtém apenas os dados validados pelo ProjectRequest
        $validatedData = $request->validated();

        // Prepara os dados básicos para atualização
        $projectData = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'link' => $validatedData['link'] ?? null,
        ];

        // Upload de nova imagem, se fornecida
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Excluir imagem antiga, se existir
            if ($project->image_path) {
                $oldPath = str_replace(Storage::url(''), '', $project->image_path);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($validatedData['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('projects', $imageName, 'public');

            // Adiciona a URL pública da nova imagem aos dados do projeto
             if ($path) {
                $projectData['image_path'] = Storage::url($path);
            }
        }

        $project->update($projectData);

        // Sincronizar categorias, se fornecidas e validadas
        if (isset($validatedData['categories']) && is_array($validatedData['categories'])) {
            $project->categories()->sync($validatedData['categories']);
        } else {
            // Se 'categories' não estiver presente ou não for um array, desanexa todas
            $project->categories()->detach();
        }

        return redirect()->route('projects.admin')->with('success', 'Projeto atualizado com sucesso');
    }

    /**
     * Remover o projeto especificado.
     */
    public function destroy(Project $project)
    {
        // Excluir imagem associada, se existir
        if ($project->image_path) {
            $path = str_replace(Storage::url(''), '', $project->image_path);
             if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }

        // Desanexar todas as categorias relacionadas
        $project->categories()->detach();

        // Excluir o registro do projeto no banco de dados
        $project->delete();

        return redirect()->route('projects.admin')->with('success', 'Projeto excluído com sucesso');
    }
    
    /**
     * Exibir a página de administração dos projetos.
     */
    public function admin()
    {
        $projects = Project::with('categories')->orderBy('created_at', 'desc')->paginate(15);
        return view('projects.admin', compact('projects'));
    }
}
