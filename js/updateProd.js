document.getElementById('UpdatePButton').addEventListener('click', function(event){
    event.preventDefault();
    
        const idProduto = document.getElementById('updatePid').value
        const nomeupdate = document.getElementById('nomePupdate').value
        const precoupdate = document.getElementById('PrecoUpdate').value
        const qtdupdate = document.getElementById('qtdUpdate').value

        const ProdutoAtualizado = {
            nome: nomeupdate,
            preco: precoupdate,
            quantidade: qtdupdate
        };


        if (!idProduto) {
            alert("Por favor, insira um id!");
            return;
        }
        fetch('/backend/produtos.php?id=' + idProduto, { 
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(ProdutoAtualizado)
        })
        .then(response => {
            if (!response.ok) {
                if (response.status === 401) {
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
                    title: "Não Atualizado",
                    text: "erro de Atualizamento!",
                    icon: "warning",
                  });
            }else{
                swal({
                    title: "Atualizado",
                    text: "Produto Atualizado com Sucesso!",
                    icon: "success",
                  });
            } 
            
        })
        .catch(error => alert('Erro na requisição: ' + error));
    });