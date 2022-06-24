$(function () {


    $('.editCategory').on('click', function () {

        
        const id = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/manajemen/categories/show/" + id,
            dataType: 'json',
            success: function (response) {
                $('#category_name2').val(response.data.category_name);
                $('#id').val(response.data.id);
                $('#method').val('put');

            }
        });

    });

    $('.editProfile').on('click', function () {

        // $('#judulModal').html('Ubah Data Surat');
        // $('.modal-footer button[type=submit]').html('Ubah Data');
        // $('.modal-body form').attr('action', 'http://localhost/crypto/public/surat/ubah');
        const id = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/dashboard/profile/" + id,
            dataType: 'json',
            success: function (response) {
                $('#id').val(response.data.id);
                $('#role').val(response.data.role);
                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#telp').val(response.data.telp);
                $('#address').val(response.data.address);
                $('#website').val(response.data.website);
                $('#business_sector').val(response.data.business_sector);
                $('#desc').val(response.data.desc);
                // $('#photo_name').val(response.data.photo_name);
                // $('.image-coba img').attr('src', "{{ asset('storage/'" + response.data.photo_name + ") }}");
            }
          
        });

    });

});
