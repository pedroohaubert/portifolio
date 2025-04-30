<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lógica para Botões de Like
    const likeButtons = document.querySelectorAll('.like-button');
    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const heartIcon = this.querySelector('.heart-icon');
            const postId = this.dataset.postId;
            
            // Alterna a cor e preenchimento do ícone
            heartIcon.classList.toggle('text-rose-600');
            heartIcon.classList.toggle('text-zinc-400'); // Garante que a cor padrão seja removida/adicionada
            heartIcon.classList.toggle('fill-current');
            
            // Aqui você pode adicionar lógica futura para enviar o like para o backend
            // console.log(`Like/Unlike post ${postId}`);
        });
    });

    // Lógica para Botões de Share
    const shareButtons = document.querySelectorAll('.share-button');
    
    // Pegamos a referência do toast único e seus elementos internos
    const toast = document.getElementById('toast');
    const toastIconContainer = document.getElementById('toast-icon-container');
    const toastText = document.getElementById('toast-text');
    const closeToastButton = document.getElementById('closeToast'); // Para garantir que existe

    // Guardamos o HTML do ícone de link para usar depois
    const linkIconHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
        </svg>
    `;

    // Guardamos o HTML e texto originais (provavelmente do email, definidos no layout)
    const originalIconHTML = toastIconContainer?.innerHTML;
    const originalText = toastText?.textContent;
    let toastTimeoutId = null; // Para controlar o timeout

    if (toast && toastIconContainer && toastText && closeToastButton) {
        shareButtons.forEach(button => {
            button.addEventListener('click', function() {
                const linkToCopy = this.dataset.link;
                
                if (linkToCopy) {
                    navigator.clipboard.writeText(linkToCopy)
                        .then(() => {
                            // Limpa timeout anterior se existir
                            if (toastTimeoutId) clearTimeout(toastTimeoutId);

                            // Modifica o conteúdo do toast
                            toastIconContainer.innerHTML = linkIconHTML;
                            toastText.textContent = 'Link copiado!';
                            
                            // Mostra o toast
                            toast.classList.add('show');
                            
                            // Esconde e restaura após 3 segundos
                            toastTimeoutId = setTimeout(() => {
                                toast.classList.remove('show');
                                // Restaura o conteúdo original APÓS a animação de saída
                                setTimeout(() => {
                                     if (originalIconHTML) toastIconContainer.innerHTML = originalIconHTML;
                                     if (originalText) toastText.textContent = originalText;
                                }, 300); // 300ms é a duração da transição definida em .toast
                            }, 3000);
                        })
                        .catch(err => {
                            console.error('Erro ao copiar link: ', err);
                            // Poderia mostrar um erro no toast também
                            toastIconContainer.innerHTML = originalIconHTML; // Ou um ícone de erro
                            toastText.textContent = 'Erro ao copiar';
                            toast.classList.add('show');
                            toastTimeoutId = setTimeout(() => {
                                toast.classList.remove('show');
                                setTimeout(() => {
                                     if (originalIconHTML) toastIconContainer.innerHTML = originalIconHTML;
                                     if (originalText) toastText.textContent = originalText;
                                }, 300);
                            }, 3000);
                        });
                } else {
                    console.error('Link não encontrado para o botão de compartilhar.');
                }
            });
        });

        // O listener do botão de fechar já está no layout

    } else {
        console.warn("Elementos do Toast não encontrados no DOM. Funcionalidade de Share pode não funcionar corretamente.");
    }
});
</script> 