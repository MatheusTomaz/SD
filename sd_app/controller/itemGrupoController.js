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

    $scope.abrirModalAddMembro = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalAddMembro',
            controller: modalControlerAddMembro,
            size: 'md',
            windowClass: 'modal-addMembro',
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

    $scope.abrirModalAddCompra = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalAddCompra',
            controller: modalControlerAddCompra,
            size: 'md',
            windowClass: 'modal-addServices',
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

    $scope.abrirModalAddConta = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalAddConta',
            controller: modalControlerAddConta,
            size: 'md',
            windowClass: 'modal-addServices',
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

    $scope.abrirModalAddDivida = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalAddDivida',
            controller: modalControlerAddDivida,
            size: 'md',
            windowClass: 'modal-addServices',
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

var modalControlerAddMembro = function ($scope, $modalInstance, $http, contaParametro) {

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

var modalControlerAddCompra = function ($scope, $modalInstance, $http, contaParametro) {

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

var modalControlerAddConta = function ($scope, $modalInstance, $http, contaParametro) {

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

var modalControlerAddDivida = function ($scope, $modalInstance, $http, contaParametro) {

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
                }else if(modalBody.length==1){
                    dataNova[1] ="u";
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

