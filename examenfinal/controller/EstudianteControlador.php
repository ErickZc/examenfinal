<?php 
    require_once 'core/DataSource.php';
    require_once 'model/EstudianteModel.php';
    require_once 'model/CarreraModel.php';

    if(isset($_GET['action'])){
        if($_GET['action'] == "agregar"){
            agregar();
        }else if($_GET['action'] == "modificar"){
            modificar();
        } else if($_GET['action'] == "eliminar"){
            eliminar();
        } else if($_GET['action'] == "mostrar"){
            mostrar();
        }else {
            index();
        }
    }else{
        index();
    }

    function index(){
        $datasource = new DataSource();
        $EstudianteModel = new EstudianteModel($datasource->conectar());
        $CarreraModel = new CarreraModel($datasource->conectar());
        $estudiante = $EstudianteModel->ver();
        //$param = $CarreraModel->ver();
        $valor1 = $CarreraModel->verUno(1);
        $valor2 = $CarreraModel->verUno(2);

        require_once 'view/carreraView.php';
    }

    function agregar(){

        if(isset($_POST['nombres'])){
            $datasource = new DataSource();
            $EstudianteModel = new EstudianteModel($datasource->conectar());
            $EstudianteModel->id_carreras = $_POST['carrera'];
            $EstudianteModel->nombres = $_POST['nombres'];
            $EstudianteModel->apellidos = $_POST['apellidos'];
            $EstudianteModel->pago_mes = $_POST['pago'];
            $EstudianteModel->add();
            header('Location: index.php?controlador='.CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
        }else{
            echo 'sd';
            exit;
        }
    }

    function eliminar(){
        if(isset($_GET['id'])){
            $datasource = new DataSource();
            $EstudianteModel = new EstudianteModel($datasource->conectar());
            $EstudianteModel->delete($_GET['id']);
            header('Location: index.php?controlador='.CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
        }
    }

    function modificar(){
        if(isset($_GET['id'])){
            $datasource = new DataSource();
            $EstudianteModel = new EstudianteModel($datasource->conectar());
            $estudiante = $EstudianteModel->verUno($_GET['id']);
            require_once 'view/modificarView.php';
        }

        if(isset($_POST['modificar']) && isset($_POST['modid'])){
            $datasource = new DataSource();
            $EstudianteModel = new EstudianteModel($datasource->conectar());
            $EstudianteModel->id = $_POST['modid'];
            $EstudianteModel->id_carreras = $_POST['modcarrera'];
            $EstudianteModel->nombres = $_POST['modnombres'];
            $EstudianteModel->apellidos = $_POST['modapellidos'];
            $EstudianteModel->pago_mes = $_POST['modpago'];
            $EstudianteModel->update();
            header('Location: index.php?controlador='.CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
        }
    }

?>