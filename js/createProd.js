document.getElementById('submitButton').addEventListener('click', function(event){
    event.preventDefault();
    
        const nomeProduto = document.getElementById('nome').value;
        const precoProduto = document.getElementById('preco').value;
        const quantidadeProduto = document.getElementById('QTD').value;
        if (!nomeProduto || !precoProduto || !quantidadeProduto) {
            alert("Por favor, insira o nome/ preço/ quantidade do produto!");
            return;
        }
    
        const Produto = {
            nome: nomeProduto,
            preco:precoProduto,
            quantidade: quantidadeProduto
        };
        fetch('/backend/produtos.php', { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(Produto)
        })
        .then(response => {
            if (!response.ok) {
                if (response.status === 401 || response.status === 403) {
                    window.location.href = './login.html';
                    throw new Error('Não autorizado');
                } else {
                    throw new Error('Sem rede ou não conseguiu localizar o recurso');
                }
            }
            return response.json();
        })
        .then(data => {
            if(!data.status){
                swal({
                    title: "Não Cadastrado",
                    text: "Produto não cadastrado com Sucesso!",
                    icon: "warning",
                  });
            }else{
                swal({
                    title: "Cadastrado",
                    text: "Produto cadastrado com Sucesso!",
                    icon: "success",
                  });
            } 
           
        })
        .catch(error => alert('Erro na requisição: ' + error));
    });
    