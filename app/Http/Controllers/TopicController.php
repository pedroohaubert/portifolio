<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Exibir uma listagem dos tópicos.
     */
    public function index(Request $request)
    {
        $query = Topic::query();

        // Filtrar por pesquisa de texto nos nomes
        if (isset($request['search']) && !empty($request['search'])) {
            $search = $request['search'];
            $query->where('name', 'like', "%{$search}%");
        }

        // Ordenação
        $sortField = $request['sort'] ?? 'name';
        $sortDirection = $request['direction'] ?? 'asc';
        $allowedSortFields = ['name', 'created_at', 'updated_at'];

        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortDirection === 'asc' ? 'asc' : 'desc');
        } else {
            $query->orderBy('name', 'asc');
        }

        // Paginação
        $perPage = $request['per_page'] ?? 15;
        $topics = $query->withCount('posts')->paginate($perPage);

        return response()->json($topics);
    }

    /**
     * Exibir o formulário para criar um novo tópico.
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Armazenar um novo tópico.
     */
    public function store(TopicRequest $request)
    {
        // O TopicRequest já validou os dados
        $topic = Topic::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'color' => $request['color'] ?? null
        ]);

        return redirect()->route('topics.admin')->with('success', 'Tópico criado com sucesso');
    }

    /**
     * Exibir o tópico especificado.
     */
    public function show(Topic $topic)
    {
        $topic->loadCount('posts');
        return view('topics.show', compact('topic'));
    }

    /**
     * Exibir o formulário para editar o tópico especificado.
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    /**
     * Atualizar o tópico especificado.
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        // O TopicRequest já validou os dados
        $topic->update([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'color' => $request['color'] ?? $topic->color
        ]);

        return redirect()->route('topics.admin')->with('success', 'Tópico atualizado com sucesso');
    }

    /**
     * Remover o tópico especificado.
     */
    public function destroy(Topic $topic)
    {
        // Desanexar todos os posts relacionados
        $topic->posts()->detach();
        
        // Excluir o tópico
        $topic->delete();

        return redirect()->route('topics.admin')->with('success', 'Tópico excluído com sucesso');
    }

    /**
     * Exibir a página de administração dos tópicos.
     */
    public function admin()
    {
        $topics = Topic::withCount('posts')->orderBy('name', 'asc')->paginate(15);
        return view('topics.admin', compact('topics'));
    }
}
