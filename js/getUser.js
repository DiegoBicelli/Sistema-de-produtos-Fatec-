document.getElementById('botaousuario').addEventListener('click', function(event){
    event.preventDefault();
    alert("click");
    const idUsuario = document.getElementById('getUserId').value

    if (!idUsuario) {
        alert("Por favor, insira um id!");
        return;
    }
    fetch('/backend/Controller/UsuarioController' + idUsuario,  { 
        method: 'GET',
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
                title: "Não encontrado",
                text: "nenhum usuario encontrado",
                icon: "warning",
              });
        }else{
            const nome = document.value = data.usuario.nome;
            const email = document.value = data.usuario.email;
            const senha = document.value = data.usuario.senha;
            swal({
                title: "usuario encontrado",
                text: "nome:  "+nome+ " email:  " +email+ " Senha:  "+ senha ,
                icon: "success",
              });
        } 
        
        
    })
    .catch(error => alert('Erro na requisição: ' + error));

});
