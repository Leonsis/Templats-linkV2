<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=68b82d5cdad81f04d6aadee1" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('temas/Dentista24h/assets/js/webflow.js') }}" type="text/javascript"></script>
<script>
// Garantir que o Webflow seja inicializado
if (typeof window.Webflow !== 'undefined') {
    window.Webflow.push(function() {
        console.log('Webflow inicializado com sucesso');
    });
} else {
    console.log('Webflow não encontrado');
}
</script>

<!-- Analytics System - Templats-Link -->
<script src="{{ asset('js/analytics.js') }}"></script>

<!-- Contact Form Analytics -->
@include('analytics.contact-form-script')

<!-- Test Analytics (temporário) -->
@if(config('app.debug'))
{{-- Scripts de teste removidos da produção --}}
{{-- <script src="{{ asset('js/test-analytics.js') }}"></script> --}}
{{-- <script src="{{ asset('js/debug-analytics.js') }}"></script> --}}
@endif

<!-- Accordion Fix Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Inicializando accordions...');
    
    // Aguardar um pouco para o Webflow carregar
    setTimeout(function() {
        // Verificar se o Webflow está carregado
        if (typeof window.Webflow === 'undefined') {
            console.log('Webflow não carregado, inicializando accordions manualmente...');
            
            // Inicializar accordions manualmente
            const accordions = document.querySelectorAll('.faq6_accordion');
            console.log('Encontrados', accordions.length, 'accordions');
            
            accordions.forEach(function(accordion, index) {
                const question = accordion.querySelector('.faq6_question');
                const answer = accordion.querySelector('.faq6_answer');
                
                if (question && answer) {
                    console.log('Configurando accordion', index + 1);
                    
                    // Adicionar indicador visual de que é clicável
                    question.style.cursor = 'pointer';
                    
                    question.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Accordion clicado:', index + 1);
                        
                        const isOpen = answer.style.height !== '0px' && answer.style.height !== '';
                        
                        if (isOpen) {
                            // Fechar
                            console.log('Fechando accordion');
                            answer.style.height = '0px';
                            answer.style.overflow = 'hidden';
                            answer.style.opacity = '0';
                        } else {
                            // Abrir
                            console.log('Abrindo accordion');
                            answer.style.height = 'auto';
                            answer.style.overflow = 'visible';
                            answer.style.opacity = '1';
                        }
                    });
                }
            });
        } else {
            console.log('Webflow carregado, accordions devem funcionar automaticamente');
        }
    }, 1000);
});
</script>