<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <img src="assets/imgs/fundoEsquerdo.jpg" alt="" class="fundoDireito">
    <section>
        <h1>Escolha sue amigo!</h1>
        <form action="#" method="POST">
            <div class="nome">
                <label for=""><b>Seu nome:</b></label>
                <input type="text" name="nmComprador">
            </div>

            <div class="entrega">
                <label for=""><b>Selecione o melhor dia pra a entrega:</b></label>
                <select name="slctDataEntrega">
                    <option value="Segunda-Feira">Segunda-Feira</option>
                    <option value="Terça-Feira">Terça-Feira</option>
                    <option value="Quarta-Feira">Quarta-Feira</option>
                    <option value="Quinta-Feira">Quinta-Feira</option>
                    <option value="Sexta-Feira">Sexta-Feira</option>
                </select>
            </div>

            <div class="garantia">
                <label><b>Quer garantia na entrega?</b></label>
                <input type="radio" name="rdEntrega" value="SIM">Sim ($18,00).
                <input type="radio" name="rdEntrega" value="NAO">Não.
            </div>

            <div class="bonecos">
                <h3>Escolha quais amiguinhos você quer!</h3>
                <p><input type="checkbox" name="bonecos[]" value="Hello-kitty">Hello Kitty R$200,00</p>
                <p><input type="checkbox" name="bonecos[]" value="Kuromi">Kuromi R$150,00</p>
                <p><input type="checkbox" name="bonecos[]" value="My-Melody">My Melody R$150,00</p>
                <p><input type="checkbox" name="bonecos[]" value="Cinnamaroll">Cinnamaroll R$150,00</p>
                <p><input type="checkbox" name="bonecos[]" value="Badtz-Mare">Badtz Maru R$100,00</p>
                <p><input type="checkbox" name="bonecos[]" value="Pochaco">Pochaco R$100,00 </p>
                <p><input type="checkbox" name="bonecos[]" value="Keroppi">Keroppi R$100,00</p>
                <p><input type="checkbox" name="bonecos[]" value="Pompompurin">Pompompurin R$100,00</p>
            </div>


            <div class="enviar"><input type="submit" value="Enviar Pedido"></div>
        </form>
    </section>
    <img src="assets/imgs/fundoDireito.jpg" alt="" class="fundoEsquerdo">
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = $_POST['nmComprador']     ?? '';
    $dtEntrega = $_POST['slctDataEntrega'] ?? '';
    $garantia = $_POST['rdEntrega']       ?? null;
    $bonecos  = $_POST['bonecos']         ?? null;

    if (!$garantia || !$bonecos) {
        echo "<p style='color: Red; font-weight: 700; font-size: 2vw;'>Você precisa escolher a garantia e pelo menos um boneco.</p>";
        exit;
    }

    $total = 0;
    $lista = "<ul>";

    foreach ($bonecos as $id) {
        $preco = 0;
        $nomeBoneco = $id;

        // aqui vão os IFs um por um
        if ($id === "Hello-kitty") {
            $preco = 200;
            $nomeBoneco = "Hello Kitty";
        }
        if ($id === "Kuromi") {
            $preco = 150;
            $nomeBoneco = "Kuromi";
        }
        if ($id === "My-Melody") {
            $preco = 180;
            $nomeBoneco = "My Melody";
        }
        if ($id === "Cinnamaroll") {
            $preco = 150;
            $nomeBoneco = "Cinnamaroll";
        }
        if ($id === "Badtz-Mare") {
            $preco = 100;
            $nomeBoneco = "Badtz Maru";
        }
        if ($id === "Pochaco") {
            $preco = 100;
            $nomeBoneco = "Pochaco";
        }
        if ($id === "Keroppi") {
            $preco = 100;
            $nomeBoneco = "Keroppi";
        }
        if ($id === "Pompompurin") {
            $preco = 100;
            $nomeBoneco = "Pompompurin";
        }

        $total += $preco;
        $lista .= "<p>{$nomeBoneco} — R$ " . number_format($preco, 2, ',', '.') . "</p>";
    }
    $lista .= "</ul>";

    // adiciona garantia
    if ($garantia === 'SIM') {
        $total += 18;
        $garantiaInfo = "SIM (R$ 18,00)";
    } else {
        $garantiaInfo = "NÃO";
    }

    // mostra resumo
    echo "<div class='overlay'>
            <div class='resumo'>
                <p><b>Nome do comprador:</b> " . $nome . "</p>
                <p><b>Dia da entrega:</b> " . $dtEntrega . "</p>
                <p><b>Garantia:</b> {$garantiaInfo}</p>
                <p><b>Bonecos:</b> {$lista}</p>

                <!-- Formata o número com 2 decimais, vírgula como separador decimal e ponto como separador de milhar -->
                <p><b>Total:</b> R$ " . number_format($total, 2, ',', '.') . "</p
            </div>
        </div>";
}
?>