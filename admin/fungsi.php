<?php 
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040015");



function query($query){
    global $conn ;
    $result = mysqli_query($conn, $query );
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    // Ambil data di tambah.php
    $id =htmlspecialchars($data['id']);
        $judul =htmlspecialchars             ($data['judul'])   ; 
        $sutradara = htmlspecialchars       ($data['sutradara']);
        $tanggal_tayang = htmlspecialchars  ($data['tanggal_tayang']);
        $kategori = htmlspecialchars        ($data['kategori']);
        $deskripsi=  htmlspecialchars   ($data['deskripsi']);
        $link  =     htmlspecialchars($data['link']);
        
    $poster = upload();
    if (!$poster){
        return false;
    }
                    // Memanggil Querry
                    $query = "INSERT INTO daftarmovie
                    VALUES
                    (null, '$judul','$sutradara','$tanggal_tayang','$kategori','$deskripsi','$poster','$link')
                    ";
                mysqli_query($conn,$query);
                return mysqli_affected_rows($conn);
}
    
        


function upload (){
    $namaFile = $_FILES['poster']['name'];
    $error = $_FILES ['poster']['error'];
    $tmpName = $_FILES['poster']['tmp_name'];

    // cek user tidak upload gambar
    if ($error === 4 ){
        echo "<script>alert('Silahkan Upload Gambar Terlebih Dahulu !');</script>";
        return false;
    }

    // Cek Apa Yang di Upload
    $ekstensiPosterValid = ['jpg','jpeg','png'];
    $ekstensiPoster     =   explode('.',$namaFile);
    $ekstensiPoster     = strtolower( end($ekstensiPoster));
    if( ! in_array($ekstensiPoster,$ekstensiPosterValid)){
        return false;
    }
    // lolos pengecekan
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstensiPoster;

    move_uploaded_file($tmpName,'img/'. $namafileBaru);

    return $namafileBaru;

}   

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM daftarmovie WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($post){
    global $conn;
    // Ambil data di tambah.php
        $id         =      $post["id"];
        $judul =htmlspecialchars             ($post['judul'])   ; 
        $sutradara = htmlspecialchars       ($post['sutradara']);
        $tanggal_tayang = htmlspecialchars  ($post['tanggal_tayang']);
        $kategori = htmlspecialchars        ($post['kategori']);
        $deskripsi=                     ($post['deskripsi']);
        $poster=                          $_FILES['poster']['name'];

    
    
            // Memanggil Querry
            $query = "UPDATE daftarmovie SET 
                        judul = '$judul',
                        sutradara ='$sutradara',
                        tanggal_tayang = '$tanggal_tayang',
                        kategori    = '$kategori',
                        deskripsi   = '$deskripsi',
                        poster =    '$poster'
                        WHERE id = $id
                        ";
        
        
        mysqli_query($conn,$query);
        
        return mysqli_affected_rows($conn);
    


}


function cari($keyword){
    $query = " SELECT * FROM daftarmovie
                WHERE
                judul = '$keyword'
    ";
    return query($query);
}



function ubahProfile($post){
    global $conn;
    $id         =      $post["id"];
    $nama       =      htmlspecialchars    ($post['nama_pengguna']);
    $nomor      =      htmlspecialchars    ($post['telepon']);
    $email      =      htmlspecialchars    ($post['email']);
    $username   =      htmlspecialchars    ($post['username']);


    $query  =  "UPDATE user SET
                                username    = '$username'   ,
                                nama        = '$nama'       ,
                                email       = '$email'      ,
                                nomor       = '$nomor'
                                WHERE id ='$id' ";
                                
        mysqli_query($conn,$query);
        
        return mysqli_affected_rows($conn);

}

// function ubahPassword($data){
//     global $conn;
//     $id         = $data["id_login"];
//     $password   = $data['password'];

//     $query = "UPDATE user SET password = '$password' WHERE id = '$id'";
//     mysqli_query($conn,$query);
//     return mysqli_affected_rows($conn);

// }

// function ubahPassword($post){
//     global $conn;

//     $id         = $post["id_login"];
//     $password   = htmlspecialchars  ($post['password']);
//     $query  = "UPDATE user SET password = $password WHERE id = '$id'" ;

//     mysqli_query($conn,$query);
//     return mysqli_affected_rows($conn);
// }



function registrasi ($data){
    global $conn;

    $username =     strtolower(stripslashes ($data ["username"]));
    $email =        strtolower(stripslashes ($data ["email"]));
    $password =     mysqli_real_escape_string($conn,$data["password"]);
    
    $password = password_hash($password,PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username Sudah Ada, Daftar Gagal');</script>";
        return false;
    }else{

        
        mysqli_query ($conn,"INSERT INTO user VALUES('','$username','$email','$password','','','')");
        
        return mysqli_affected_rows($conn);
    }
}









?>