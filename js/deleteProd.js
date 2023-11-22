document.getElementById('DeleteButton').addEventListener('click', function(event){
    event.preventDefault();
    
        const idproduto = document.getElementById('deletePid').value

        if (!idproduto) {
            alert("Por favor, insira um id!");
            return;
        }
        fetch('/backend/produtos.php?id=' + idproduto,  { 
            method: 'DELETE',
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
                    title: "Não deletado",
                    text: "erro de deletamento!",
                    icon: "warning",
                  });
            }else{
                swal({
                    title: "Deletado",
                    text: "produto Deletado com Sucesso!",
                    icon: "success",
                  });
            } 
            
        })
        .catch(error => alert('Erro na requisição: ' + error));


    });