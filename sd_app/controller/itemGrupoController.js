var moduloItemGrupo = angular.module('moduloItemGrupo', [ 'ui.bootstrap']);

moduloItemGrupo.controller('controllerItemGrupo', function($scope, $http, $window, $filter, $compile, $modal) {

    $scope.abaPrincipal = function(){
        document.getElementById("principal").style.display = "";
        document.getElementById("compras").style.display = "none";
        document.getElementById("dividas").style.display = "none";
        document.getElementById("contas").style.display = "none";
    };

    $scope.abaContas = function(){
        document.getElementById("principal").style.display = "none";
        document.getElementById("compras").style.display = "none";
        document.getElementById("dividas").style.display = "none";
        document.getElementById("contas").style.display = "";
    };

    $scope.abaCompras = function(){
        document.getElementById("principal").style.display = "none";
        document.getElementById("compras").style.display = "";
        document.getElementById("dividas").style.display = "none";
        document.getElementById("contas").style.display = "none";
    };

    $scope.abaDividas = function(){
        document.getElementById("principal").style.display = "none";
        document.getElementById("compras").style.display = "none";
        document.getElementById("dividas").style.display = "";
        document.getElementById("contas").style.display = "none";
    };




    $scope.abrirModalItemGrupos = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalItemGrupo',
            controller: modalControlerItemGrupo,
            size: 'md',
            windowClass: 'modal-amigos',
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

var modalControlerItemGrupos = function ($scope, $modalInstance, $http, contaParametro) {



    $scope.pesquisar = function(pesquisa){

        // Se a pesquisa for vazia
        if (pesquisa == ""){

            // Retira o autocomplete
            document.getElementById("pesquisarPessoas").style.display = "none";

        }else{

            // Pesquisa no banco via AJAX
            $http.post('controller/pesquisarPessoas.php', { "data" : pesquisa}).success(function(data) {

                // Coloca o autocomplemento
                document.getElementById("pesquisarPessoas").style.display = "";

                // JSON retornado do banco
                $scope.dicas = data;

            }).error(function(data) {
                // Se deu algum erro, mostro no log do console
                console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
            });
        }
    };

    $scope.fechar = function () {
        $modalInstance.dismiss('obrigado por fechar');
    };
};

