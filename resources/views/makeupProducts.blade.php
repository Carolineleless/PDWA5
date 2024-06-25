<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Maquiagens</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }

        .makeup-form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            color: #E1A1C1;
            margin-bottom: 37px;
        }

        p {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            display: block;
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            background-color: #e91e63;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c2185b;
        }

        /* Estilos para o menu */
        header {
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        nav {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-left: 15px;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-size: 1.2rem;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="xml">Gerar XML</a></li>
            </ul>
        </nav>
    </header>

    <div class="makeup-form">
        <h1>Olá! Sejam todos bem-vindos ao nosso formulário de maquiagens.</h1>

        <p>Abaixo terão algumas perguntas para serem respondidas.</p>

        <form id="makeupForm" action="{{ route('saveQuiz') }}" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="nome">Insira o nome da maquiagem:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
    
            <div class="form-group">
                <label for="tipo">Insira o tipo dessa maquiagem (exemplos: sombra, batom, base):</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
    
            <div class="form-group">
                <label for="marca">Insira a marca da maquiagem:</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>

            <div class="form-group">
                <label for="preco">Agora, insira o preço (exemplo: 45.50):</label>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div>
    
            <div class="form-group">
                <label for="ingredientes">Por último, insira os ingredientes (exemplo: naturais, veganos, com antioxidantes, sem parabenos):</label>
                <textarea class="form-control" id="ingredientes" name="ingredientes" rows="5" required></textarea>
            </div>
    
            <button type="submit">Salvar Respostas</button>
        </form>
    </div>

    <!-- Scripts JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("makeupForm");

            form.addEventListener("submit", function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                    method: form.method,
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) {
                        form.reset();
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
            });
        });
    </script>
</body>
</html>
