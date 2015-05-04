var moduloAmigos = angular.module('moduloAmigos', [ 'ui.bootstrap']);

moduloAmigos.controller('controllerAmigos', function($scope, $http, $window, $filter, $compile, $modal) {



    $scope.abrirModalAmigos = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalGrupos',
            controller: modalControlerGrupos,
            size: 'md',
            windowClass: 'modal-grupos',
            resolve: {
                contaParametro: function () {
                    return 'oi';
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
            console.log(selectedItem);
        });
    };
});

var modalControlerAmigos = function ($scope, $modalInstance, $http, contaParametro) {

    $scope.pesquisar = function(pesquisa){

        // Se a pesquisa for vazia
        if (pesquisa == ""){

            // Retira o autocomplete
            document.getElementById("autocomplete").style.display = "none";

        }else{

            var modalBody = document.getElementById('bodyModal').children;
            // Pesquisa no banco via AJAX
            $http.post('controller/autocomplete.php', { "data" : pesquisa}).success(function(data) {

                // Coloca o autocomplemento



                var dataNova = [];
                var idObj = 0;
                var k = 0;
                achou = false;

                if(modalBody.length==0){
                    dataNova = data;
                }else{
                    for (var i = 0; i <= data.length-1; i++) {
                        console.log(data[i].nome);
                        for (var j = 0; j <= modalBody.length-1; j++) {
                            // console.log(modalBody[j].id+"iai");
                            for (var a = 15; a<=modalBody[j].id.length-1; a++){
                                idObj =+ modalBody[j].id[a];
                            }
                            if(data[i].id==idObj){
                                achou = true;
                            }
                        }
                        if(achou==false && data[i].id != null && data[i].nome != null){
                            dataNova[k] = {
                                id: data[i].id,
                                nome:data[i].nome
                            };
                            k =+ 1;
                        }
                        achou = false;
                    }
                };
                if(dataNova[1] == "u" || dataNova.length == 0){
                    console.log("n tem");
                    document.getElementById("autocomplete").style.display = "none";
                }else{
                    console.log("tem");
                    document.getElementById("autocomplete").style.display = "";
                }

                // JSON retornado do banco
                $scope.dicas = dataNova;



                console.log(dataNova);
            }).error(function(data) {
                // Se deu algum erro, mostro no log do console
                console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
            });
        }
    };

    $scope.selecionarPesquisa = function(key){
        var valueItemAutoComplete = document.getElementById("nome"+key).attributes["value"].value;
        var item = document.getElementById("nome"+key).attributes["id"].value[4];

        document.getElementById("bodyModal").innerHTML = document.getElementById("bodyModal").innerHTML+'<div id="itemSelecionado'+item+'" class="contBodyModal"><button type="button" onclick="removerSelecionado('+item+')" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><img src="assets/img/user.jpg" class="img-circle"> &nbsp;'+valueItemAutoComplete+'</div>';

        document.getElementById("inputFormModal").reset();

        document.getElementById("autocomplete").style.display = "none";
    };

    removerSelecionado = function(item1){
        $("#itemSelecionado"+item1).remove();
    };

    $scope.fechar = function () {
        $modalInstance.dismiss('obrigado por fechar');
    };
};

