<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Exibir a página de administração das categorias.
     */
    public function admin(Request $request): View
    {
        $query = Category::query();

        // Filtrar por pesquisa de texto nos nomes (opcional, manter se desejar filtro na admin view)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        // Ordenação (opcional, manter se desejar ordenação na admin view)
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');
        $allowedSortFields = ['name', 'created_at', 'updated_at'];

        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortDirection === 'asc' ? 'asc' : 'desc');
        } else {
            $query->orderBy('name', 'asc'); // Ordenação padrão
        }

        // Paginação
        $perPage = $request->input('per_page', 15);
        $categories = $query->withCount('projects')->paginate((int)$perPage);

        return view('categories.admin', compact('categories'));
    }

    /**
     * Exibir o formulário para criar uma nova categoria.
     */
    public function create(): View
    {
        return view('categories.create', [
            'colors' => $this->getPresetColors()
        ]);
    }

    /**
     * Armazenar uma nova categoria.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        // O CategoryRequest já validou os dados
        Category::create([
            'name' => $request->validated('name'),
            'color' => $request->validated('color')
        ]);

        return redirect()->route('categories.admin')
                         ->with('success', 'Categoria criada com sucesso');
    }

    /**
     * Exibir a categoria especificada (mantido como JSON, ou adaptar para uma view se necessário).
     */
    public function show(Category $category)
    {
        // Se quiser uma view para 'show', crie categories.show.blade.php
        // e descomente/adapte a linha abaixo:
        // return view('categories.show', compact('category'));
        
        // Retornando JSON como antes, útil para APIs
        $category->load('projects');
        return response()->json($category);
    }

    /**
     * Exibir o formulário para editar a categoria especificada.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', [
            'category' => $category,
            'colors' => $this->getPresetColors()
        ]);
    }

    /**
     * Atualizar a categoria especificada.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        // O CategoryRequest já validou os dados
        $category->update([
            'name' => $request->validated('name'),
            'color' => $request->validated('color')
        ]);

        return redirect()->route('categories.admin')
                         ->with('success', 'Categoria atualizada com sucesso');
    }

    /**
     * Remover a categoria especificada.
     */
    public function destroy(Category $category): RedirectResponse
    {
        // Verificar se há projetos associados
        if ($category->projects()->exists()) { // Usar exists() é mais eficiente
             return redirect()->route('categories.admin')
                         ->with('error', 'Não é possível excluir esta categoria pois existem projetos associados a ela.');
        }
        
        $category->delete();

        return redirect()->route('categories.admin')
                         ->with('success', 'Categoria excluída com sucesso');
    }

    /**
     * Obter uma lista de cores predefinidas para categorias.
     * 
     * @return array<int, string>
     */
    private function getPresetColors(): array
    {
        return [
            '#007bff', // Azul
            '#28a745', // Verde
            '#dc3545', // Vermelho
            '#ffc107', // Amarelo
            '#17a2b8', // Ciano
            '#6610f2', // Índigo
            '#fd7e14', // Laranja
            '#6f42c1', // Roxo
            '#20c997', // Verde água
            '#e83e8c', // Rosa
            '#6c757d', // Cinza
        ];
    }
}
