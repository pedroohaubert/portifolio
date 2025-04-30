<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Exibir uma listagem dos posts.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // Filtrar por pesquisa de texto nos títulos e descrições
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where(function(Builder $q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filtrar por tópico
        if ($request->has('topic') && !empty($request->input('topic'))) {
            $topicId = $request->input('topic');
            $query->whereHas('topics', function(Builder $q) use ($topicId) {
                $q->where('topics.id', $topicId);
            });
        }

        // Ordenação (padrão: mais recentes)
        $query->orderBy('created_at', 'desc');

        // Paginação
        $posts = $query->with('topics')->paginate(6);

        // Buscar todos os tópicos para filtros
        $topics = Topic::all();
        
        // Buscar categorias para o filtro (se existir relação)
        $categories = Category::all();

        // Renderizar a view de posts
        return view('posts', compact('posts', 'topics', 'categories'));
    }

    /**
     * Exibir o formulário para criar um novo post.
     */
    public function create()
    {
        $topics = Topic::all();
        return view('posts.create', compact('topics'));
    }

    /**
     * Armazenar um novo post.
     */
    public function store(PostRequest $request)
    {
        // O PostRequest já validou os dados
        $post = Post::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content']
        ]);

        // Anexar tópicos, se fornecidos
        if (isset($request['topics'])) {
            $post->topics()->attach($request['topics']);
        }

        return redirect()->route('posts.admin')->with('success', 'Post criado com sucesso');
    }

    /**
     * Exibir o post especificado.
     */
    public function show(Post $post)
    {
        // Carregamos os tópicos relacionados
        $post->load('topics');
        
        return view('posts.show', compact('post'));
    }

    /**
     * Exibir o formulário para editar o post especificado.
     */
    public function edit(Post $post)
    {
        $post->load('topics');
        $topics = Topic::all();
        
        return view('posts.edit', compact('post', 'topics'));
    }

    /**
     * Atualizar o post especificado.
     */
    public function update(PostRequest $request, Post $post)
    {
        // O PostRequest já validou os dados
        $post->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content']
        ]);

        // Sincronizar tópicos, se fornecidos
        if (isset($request['topics'])) {
            $post->topics()->sync($request['topics']);
        }

        return redirect()->route('posts.admin')->with('success', 'Post atualizado com sucesso');
    }

    /**
     * Remover o post especificado.
     */
    public function destroy(Post $post)
    {
        // Desanexar todos os tópicos (não é necessário, mas explícito)
        $post->topics()->detach();
        
        // Excluir o post
        $post->delete();

        return redirect()->route('posts.admin')->with('success', 'Post excluído com sucesso');
    }

    /**
     * Exibir a página de administração dos posts.
     */
    public function admin()
    {
        $posts = Post::with('topics')->orderBy('created_at', 'desc')->paginate(15);
        return view('posts.admin', compact('posts'));
    }
}
