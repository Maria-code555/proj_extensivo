
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro - Janine Cosméticos</title>

    <link rel="stylesheet" href="cadastro.css">
    <script src="js/api.js"></script>
</head>

<body>

    <header>isa vai fazer</header>

    <main>

        <!-- IMAGEM LATERAL DO CADASTRO -->
        <figure class="figure_cadastro">

            <img src="https://images.unsplash.com/photo-1748543668646-e81cda0890f3?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&q=80&w=1000" alt="Imagem de cosméticos">

            <div class="texto_imagem">
                <p>BEM-VINDA DE VOLTA</p>

                <h1>Seu cuidado continua por aqui.</h1>

                <p>
                    Acesse sua conta para acompanhar pedidos
                    e finalizar suas escolhas.
                </p>
            </div>

        </figure>

        <!-- ÁREA DO CADASTRO -->
        <div class="pagina-cadastro">

            <!-- LADO DIREITO DA PÁGINA -->
            <section class="lado-direito">

                <div class="formulario">

                    <p class="subtitulo">CRIE SUA CONTA</p>

                    <h1>Vamos começar?</h1>

                    <p class="descricao">
                        Preencha seus dados para comprar com segurança.
                    </p>

                    <form action="inseriri_user.php" method="post">

                        <!-- NOME -->
                        <div class="campo">
                            <label for="nome_completo">Nome completo *</label>

                            <input
                                type="text"
                                name="nome_completo"
                                id="nome_completo"
                                placeholder="Como podemos chamar você?"
                                required
                            >
                        </div>

                        <!-- EMAIL -->
                        <div class="campo">
                            <label for="email">E-mail *</label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                placeholder="seuemail@exemplo.com"
                                required
                            >
                        </div>

                        <!-- CPF -->
                        <div class="campo">
                            <label for="cpf">CPF *</label>

                            <input
                                type="text"
                                name="cpf"
                                id="cpf"
                                placeholder="000.000.000-00"
                                required
                            >
                        </div>

                        <!-- TELEFONE -->
                        <div class="campo">
                            <label for="telefone">Telefone *</label>

                            <input
                                type="text"
                                name="telefone"
                                id="telefone"
                                placeholder="(00) 00000-0000"
                                required
                            >
                        </div>

                        <!-- ENDEREÇO -->
                        <div class="separador"></div>

                        <h3>Endereço de entrega</h3>

                        <!-- CEP E RUA -->
                        <div class="linha">

                            <div class="campo cep">
                                <label for="cep">CEP *</label>

                                <input
                                    type="text"
                                    name="cep"
                                    id="cep"
                                    placeholder="00000-000"
                                    onblur="pesquisacep(this.value);"
                                    onkeyup="mascaraCEP(this)"
                                    required
                                >
                            </div>

                            <div class="campo">
                                <label for="rua">Logradouro *</label>

                                <input
                                    type="text"
                                    name="rua"
                                    id="rua"
                                    placeholder="Rua ou avenida"
                                    required
                                >
                            </div>

                        </div>

                        <!-- NÚMERO E BAIRRO -->
                        <div class="linha">

                            <div class="campo numero">
                                <label for="num">Número *</label>

                                <input
                                    type="number"
                                    name="num"
                                    id="num"
                                    required
                                >
                            </div>

                            <div class="campo">
                                <label for="bairro">Bairro *</label>

                                <input
                                    type="text"
                                    name="bairro"
                                    id="bairro"
                                    placeholder="Seu bairro"
                                    required
                                >
                            </div>

                        </div>

                        <!-- CIDADE E UF -->
                        <div class="linha">

                            <div class="campo">
                                <label for="cidade">Cidade *</label>

                                <input
                                    type="text"
                                    name="cidade"
                                    id="cidade"
                                    placeholder="Sua cidade"
                                    required
                                >
                            </div>

                            <div class="campo uf">
                                <label for="uf">UF *</label>

                                <input
                                    type="text"
                                    name="uf"
                                    id="uf"
                                    placeholder="RJ"
                                    maxlength="2"
                                    required
                                >
                            </div>

                        </div>

                        <!-- COMPLEMENTO -->
                        <div class="campo">
                            <label for="comp">Complemento</label>

                            <input
                                type="text"
                                name="comp"
                                id="comp"
                                placeholder="Apartamento, bloco etc."
                            >
                        </div>

                        <!-- SENHA -->
                        <div class="campo">
                            <label for="senha">Senha *</label>

                            <input
                                type="password"
                                name="senha"
                                id="senha"
                                placeholder="Digite sua senha"
                                required
                            >
                        </div>

                        <!-- TERMOS DE USO -->
                        <label class="termos">

                            <input
                                type="checkbox"
                                name="termos"
                                id="termos"
                                required
                            >

                            <span>
                                Li e concordo com os termos de uso e privacidade.
                            </span>

                        </label>

                        <!-- BOTÃO DE CADASTRO -->
                        <button type="submit">
                            Criar minha conta <span>→</span>
                        </button>

                        <!-- LINK PARA LOGIN -->
                        <p class="login">
                            Já tem uma conta?
                            <a href="login.php">Entrar</a>
                        </p>

                    </form>

                </div>

            </section>

        </div>

    </main>

    <footer>isa vai fazer</footer>

</body>

</html>
