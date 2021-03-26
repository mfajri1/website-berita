$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // proses hapus data dengan chckbox
    $("#check-semua").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });

    // ketika kita mengklik tombol hapus
    $("#del").click(function(){ // Ketika user mengklik tombol delete
      const confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      // const data = $(".check-item:checked").val();
      // alert(data);
      if(confirm){
          $("#form-delete").submit(); // Submit form
          alert("data Berhasil Di hapus");
      }
      else{
        alert("Batal Hapus");
        $(".check-item").prop("checked", false);
        return false;
      }
    });
    // akhir hapus data dengan chckbox





    //proses tambah data kategori sekali banyak    
    /*
    // cara1
    let nomor = 0;
    $('.tambahLagi').click(function(){
      nomor++;
      console.log(nomor);
      $('.formTambah').append(
          `<div class="d-flex justify-content-start baris">
            <div class="form-group flex-grow-1 mr-1">
              <input type="hidden" name="nomor[]">
              <input type="text" name="namaKategoriBerita[]" class="form-control" id="namaKategoriBerita" placeholder="Nama Kategori" autocomplete>
            </div>
            <div class="form-group mr-1">
              <select class="form-control" name="status[]" id="status">
                <option value="aktif">Aktif</option>
                <option value="tidak">NonAktif</option>
              </select>
            </div>
            <div class="form-group mr-1">
              <input type="button" class="btn btn-danger check-item hapus" value="del">
            </div>
          </div>`
      );
    // akhir cara 1
    */




    
    // cara 2 tambah data kategori sekali banyak
    let nomor = 0;
    $('.tambahLagi').click(function(){
      nomor++;
      console.log(nomor);
      $('.formTambah').append(
          `<div class="d-flex justify-content-start baris">
            <div class="form-group flex-grow-1 mr-1">
              <input type="hidden" name="nomor[]">
              <input type="text" name="namaKategoriBerita[]" class="form-control" id="namaKategoriBerita${nomor}" placeholder="Nama Kategori" autocomplete>
            </div>
            <div class="form-group flex-grow-1 mr-1">
              <input type="text" name="searchBerita[]" class="form-control" id="searchBerita${nomor}" placeholder="Search Berita" autocomplete>
            </div>
            <div class="form-group mr-1">
              <select class="form-control" name="status[]" id="status">
                <option value="aktif">Aktif</option>
                <option value="tidak">NonAktif</option>
              </select>
            </div>
            <div class="form-group mr-1">
              <input type="button" class="btn btn-danger check-item hapus" value="del">
            </div>
          </div>`
      );


      // membuat slug kategori
      $('#namaKategoriBerita'+nomor).on('keyup', function(){
        let isiData = $(this).val().replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g,'-');
        // console.log(isiData);
        let searchBerita = $('#searchBerita'+nomor).val(isiData);
        // console.log(searchBerita);
      });
      
      // menampilkan tombol simpan pada file kategori
      $('.tombol').show('slow', function(){
        $(this).removeClass('d-none');
      })

      // menghapus tambah kategori berita sesuai dengan parentsnya ketika nambah kategori
      $(".hapus").on("click", function () {
        $(this).parents(".baris").remove();
      });


    });

    // akhir cara 2 





    //untuk menampilkan nama file yang di ambil dari browser dengan menggunakan jquery
    $('.custom-file-input').on('change', function(){
      let filename = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(filename);
    });




    // let noGambar = 0;
    // $('#tambahGambarBerita').on('click', function(){
    //   noGambar++;
    //   // console.log(noGambar);
    //   $('.formGambar').append(
    //     `<div class="d-flex justify-content-start baris">
    //         <div class="form-group flex-grow-1 mr-1">
    //         <input type="hidden" name="no[]" value="${noGambar}">
    //           <div class="custom-file">
    //             <input type="file" name="namaGambar[]" class="custom-file-input" id="gambar" multiple>
    //             <label class="custom-file-label" for="gambar">Pilih gambar</label>
    //           </div>
    //         </div>
    //         <div class="group">
    //           <input type="button" class="btn btn-danger hapus" value="Del">
    //         </div>
    //       </div>`
    //   );

    //   // menampilkan tombol simpan
    //   $('.tombol').show('slow', function(){
    //     $(this).removeClass('d-none');
    //   })

    //   // menghapus tambah kategori berita sesuai dengan parentsnya ketika nambah kategori
    //   $(".hapus").on("click", function () {
    //     noGambar--;
    //     $(this).parents(".baris").remove();

    //     console.log(noGambar);
    //   });

    //   $('.custom-file-input').on('change', function(){
    //     let filename = $(this).val().split('\\').pop();
    //     $(this).next('.custom-file-label').addClass("selected").html(filename);
    //   });

      
    // });



    // menambahkan gambar tambahan ke dalam tabel berita
    $('#tambahGambarBerita').on('click', function(){
      $('.formGambar').html(`
        <div class="d-flex justify-content-start mx-3 baris">
          <div class="form-group flex-grow-1 mr-1 ">
              <div class="custom-file">
                <input type="file" name="namaGambar" class="custom-file-input" id="gambar">
                <label class="custom-file-label" for="gambar">Pilih gambar</label>
              </div>
            </div>
          <div class="group">
            <input type="button" class="btn btn-danger hapus" value="Del">
          </div>
        </div>
      `);

      $('.tombol').show('fast', function(){
        $(this).removeClass('d-none');
      })

      $(".hapus").on("click", function () {
        $(this).parents(".baris").remove();

        console.log(noGambar);
      });

      $('.custom-file-input').on('change', function(){
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
      });


    });




    // Script register
    $('.txtPassword').hide();
    $('.passwordRepeat').blur(function(){
      let password = $('.password').val();
      let passwordRepeat = $('.passwordRepeat').val();
      if(password != passwordRepeat){
        $('.txtPassword').show();
      }else{
        $('.txtPassword').hide();
      }
    });




    // script login
    $('#loginForm').submit(function(e){
      e.preventDefault(); // prntdefault() => digunakan untuk memblok submit
      let url = $('#loginForm').attr('action');
      let method = $('#loginForm').attr('method');
      let data = $(this).serialize();
      if( data.length == ""){
        alert('Username Tidak Boleh Kosong');
      }

      // setTimeout(function() {

      // }, 500); delay


      $.ajax({
        url : url,
        type : method,
        dataType : 'json',
        data : data,
        beforeSend : function(){
          $('#loading').removeClass('d-none');

        },
        success : function(result, textStatus, ketData){
          setTimeout(function() {
            if(result.hasilCek == 'berhasil' ){
              // alert(`Anda Berhasil ${textStatus}, Kode Status ${ketData.status}`);

              if(result.hasilBlokir == 'tidak'){


                if(result.aktivasi == 'aktif' && result.hasilBlokir == 'tidak'){

                  if(result.levelUser == 'admin'){
                    window.location.href = `user/user/tampilBerita`;
                  }else if(result.levelUser == 'operator'){
                    window.location.href = `user/user/tampilBerita`;
                    // window.location.href = 'operator/' + result.levelUser;
                  }else if(result.levelUser == 'user'){
                    window.location.href = `user/${result.levelUser}/tampilBerita`;
                    // window.location.href = 'operator/' + result.levelUser;
                  }else{
                    window.location.href = `home`;
                    // window.location.href = 'user/' + result.levelUser;
                  }

                }else if(result.aktivasi == 'nonaktif' && result.hasilBlokir == 'tidak'){
                  alert('status anda belum aktif');
                  window.location.href = 'home';
                }

              }else{
                alert('anda telah di blokir');
                window.location.href = 'home';
              }
            }else if(result.hasilCek == 'gagal'){
              if (result.jmlPassSalah == null) {
                alert('data anda salah');
                window.location.href = 'home';
              }else{
                let jmlSalPass = 3 - result.jmlPassSalah;
                alert(`data anda salah sudah ${result.jmlPassSalah}, sisa untuk Login ${jmlSalPass} !`);
                window.location.href = 'home';
              }
            }  

          }, 1000);
        },
        // error : function(status, textStatus, kodeError){
        //   alert(`error ${status}, text ${textStatus}, kode ${kodeError}`);
        // }
      })

    });




    // script data data pengguna satu satu pada menu profile
    /*
    $('.editData1').click(function(){
      let cekReadonly = $('#namaUser').prop('readonly');
      if (cekReadonly == true){
        $('#namaUser').prop('readonly', false);
      }else{
        $('#namaUser').prop('readonly', true);
        let simpan = $('#namaUser').prop('readonly');
        if (simpan == true) {
          let idUser = $('.idUser').val();
          let namaUser = $('#namaUser').val();
          console.log(namaUser);
          let url = $('#editDataUser').attr('action');
          $.ajax({
            url : `editPengguna`,
            async : true,
            type : 'POST',
            dataType : 'json',
            data : {
              'namaUser' : namaUser
            },
            success : function(result){
              console.log(result);
            }

          });
        }
      }
    });
    */



    // edit data pengguna pada menu profile
    $('.editDataSemua').click(function(){
      let cekEdit = $('.field').prop('disabled');
      if(cekEdit == true){
        $('.field').prop('disabled',false);
        $('.simpanData').removeClass('d-none');
        $('.simpanData').on('click', function(e){
          e.preventDefault();
          let idUser = $('#idUser').val();
          let url = $('#formEdit').attr('action');
          let type = $('#formEdit').attr('method');
          let data = $('#formEdit').serialize();

          $.ajax({
            url : 'editDataPengguna/' + idUser,
            async : true,
            type : type,
            dataType : 'json',
            data : data,
            success : function(hasil){
              if (hasil.hasilUpdate == true) {
                $('.field').prop('disabled',true);
                $('.simpanData').addClass('d-none');
              }else{
                $('.field').prop('disabled',true);
                $('.simpanData').addClass('d-none');
              }
            },

          });
        });
      }else{
        $('.field').prop('disabled',true);
        $('.simpanData').addClass('d-none');
      }

    });




    // view password
    let angka = 0;
    $('.viewPass1').click(()=>{
      angka++;
      if(angka == 1){
        $('.viewPass1').removeClass('text-success').addClass('text-danger');
        $('.viewPass1').removeClass('fa-eye').addClass('fa-eye-slash');
        $('#password').attr('type','text');
      }else{
        angka = 0;
        $('.viewPass1').removeClass('fa-eye-slash').addClass('fa-eye');
        $('.viewPass1').removeClass('text-danger').addClass('text-success');
        $('#password').attr('type','password');
      }
    });

    $('.viewPass2').click(()=>{
      angka++;
      if(angka == 1){
        $('.viewPass2').removeClass('text-success').addClass('text-danger');
        $('.viewPass2').removeClass('fa-eye').addClass('fa-eye-slash');
        $('#password2').attr('type','text');
      }else{
        angka = 0;
        $('.viewPass2').removeClass('text-danger').addClass('text-success');
        $('.viewPass2').removeClass('fa-eye-slash').addClass('fa-eye');
        $('#password2').attr('type','password');
      }
    });




    // edit status Menu dengan checkbox
    $('.checkStatusMenu').on('click', function(){
      const idMenu = $(this).attr('id');
      const valCheckMenu = $(this).val();
      const checkMenu = $(this).prop('checked');
      // console.log(idMenu);

      $.ajax({
        url : 'editStatusMenu',
        async : true,
        type : 'POST',
        dataType : 'json',
        data : {
          'idMenu' : idMenu,
          'statusMenu' : valCheckMenu   
        },
        success : function(result){
          // console.log(result);
          window.location.href='tampil_menu';
        },
        error : function(error, textError){
          console.log(error);
        }

      });

    });



    // edit status Menu dengan checkbox
    $('.checkStatusSubmenu').on('click', function(){
      const idSubmenu = $(this).attr('data-subId');
      const valStatusSubMenu = $(this).val();
      console.log(idSubmenu);

      $.ajax({
        url : 'editStatusSubmenu',
        async : true,
        type : 'POST',
        dataType : 'json',
        data : {
          'idSubMenu' : idSubmenu,
          'statusSubmenu' : valStatusSubMenu
        },
        success : function(result){
          window.location.href = 'tampilSubmenu';
        },
        error : function(result, hasil){
          alert(hasil);
        }
      });

    });


    // edit status Menu dengan checkbox
    $('.checkStatusMenuFront').on('click', function(){
      const idMenuFront = $(this).attr('id');
      const valStatusMenuFront = $(this).val();
      console.log(idMenuFront);

      $.ajax({
        url : 'manageMenuFront/editStatusMenuFront',
        async : true,
        type : 'POST',
        dataType : 'json',
        data : {
          'idMenuFront' : idMenuFront,
          'statusMenuFront' : valStatusMenuFront
        },
        success : function(result){
          window.location.href = 'manageMenuFront';
        },
        error : function(result, hasil){
          alert(hasil);
        }
      });

    });



    // tambah komentar di frontend dengan ajax
    $('.tambahKomentar').submit(function(e){
      e.preventDefault();
      const dataKoment = $(this).serialize();
      const urltmbKoment = $(this).attr('action');
      const method = $(this).attr('method');
      console.log(dataKoment);

      $.ajax({
        url : urltmbKoment,
        async : true,
        type : method,
        dataType : 'json',
        data : dataKoment,
        success : function(result){
          alert('berhasil');
          location.reload();
        },
        error : function(result, hasil){
          console.warn(result, hasil);
        }
      });

    });


    


});

