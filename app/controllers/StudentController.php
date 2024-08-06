<?php
namespace App\Controllers;
use App\Models\Student;
class StudentController extends BaseController{
    public $student;
    public function __construct(){
        $this->student = new Student();
    }
    function getStudent() {
        $students =$this->student->getListStudent();
        return $this->render('student.index',compact('students'));
    }
    public function create(){
        //Hiển thị form thêm
        return $this->render('student.create');
    }

    public function store(){
        if(isset($_POST['btn-submit'])){
            //validate
            $error=[];//Chữa lỗi
            if(empty($_POST['name'])){
                $error[]="Bạn phải nhập tên";
            }
            if(empty($_POST['year_of_birth'])){
                $error[]="Bạn phải nhập năm sinh";
            }
            if(empty($_POST['phone_number'])){
                $error[]="Bạn phải nhập số điện thoại";
            }
            if(count($error)){
                redirect('errors',$error, 'create');
            }else{
                $check = $this->student->insertDataStudent(null,$_POST['name'],$_POST['year_of_birth'],$_POST['phone_number']);
                if($check){
                    redirect('success','Thêm thành công', 'create');
                }else{
                    redirect('errors','Thêm thất bại', 'create');
                }
            }
        }
    }

    public function edit($id){
        $listStu=$this->student->idStudent($id);
        return $this->render('student.edit',compact('listStu'));
    }

    public function update($id){
        if($_POST['sua']){
            $error=[];
            if(empty($_POST['name'])){
                $error[]="Bạn phải nhập tên";
            }
            if(empty($_POST['year_of_birth'])){
                $error[]="Bạn phải nhập năm sinh";
            }
            if(empty($_POST['phone_number'])){
                $error[]="Bạn phải nhập số điện thoại";
            }
            $route = 'edit/'.$id;
            if(count($error)>=1){
                redirect('errors',$error,$route);
            }else{
                $check=$this->student->updateStudent($_POST['name'],$_POST['year_of_birth'],$_POST['phone_number'],$id);
                if($check){
                    redirect('success','<script>alert("Chỉnh sửa thành công!");</script>',$route);
                }
            }
        }
    }

    public function destroy($id){
        $check = $this->student->deleteStudent($id);
        if($check){
            redirect('success','<script>alert("xóa thành công");</script>','index');
        }
    }
}
