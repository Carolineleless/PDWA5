<style>
#generateXmlButton {
    background-color: #000080;
    color: white;
    padding: 12px 20px;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gere o XML dos registros da tabela de maquiagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ __('Para gerar o XML, clique no botão abaixo. O XML irá aparecer na tela.') }}</p>
                    <div class="flex justify-center mt-4">
                    <button id="generateXmlButton">
                        <span class="relative z-10">{{ __('Gerar XML') }}</span>
                    </button>
                    </div>
                    <pre id="xmlContent" class="mt-4 bg-gray-100 p-4 rounded overflow-x-auto"></pre>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const button = document.getElementById("generateXmlButton");
            const xmlContent = document.getElementById("xmlContent");

            button.addEventListener("click", function() {
                fetch("{{ route('generateXml') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/xml'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    xmlContent.textContent = data;
                })
                .catch(error => {
                    console.error('Erro:', error);
                    xmlContent.textContent = 'Ocorreu um erro ao gerar o XML.';
                });
            });
        });
    </script>
</x-app-layout>
