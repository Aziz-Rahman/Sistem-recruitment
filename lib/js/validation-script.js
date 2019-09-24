
$().ready(function() {
    // validate the comment form when it is submitted
    $("#feedback_form").validate();

    // info: don't to use (-), use underscore(_)

    // validate to register user
    $("#form-data-pelamar").validate({
        rules: {
            id_master_unit: {
                required: true,
            },
            id_master_jabatan: {
                required: true,
            },
            nama_lengkap: {
                required: true,
            },
            tempat_lahir: {
                required: true,
            },
            tanggal_lahir: {
                required: true,
            },
            // suku: {
            //     required: true,
            // },
            agama: {
                required: true,
            },
            anak_ke: {
                required: true,
            },
            jumlah_saudara: {
                required: true,
            },
            alamat_domisili: {
                required: true,
            },
            handphone: {
                required: true,
                number: true,
            },
            no_ktp: {
                required: true,
                number: true,
            },
            ktp_dikeluarkan_di: {
                required: true,
            },
            // masa_berlaku_ktp: {
            //     required: true,
            // },
            // ortu
            nama_ayah: {
                required: true,
            },
            alamat_rumah_ayah: {
                required: true,
            },
            nama_ibu: {
                required: true,
            },
            alamat_rumah_ibu: {
                required: true,
            },
        },
        messages: { 
            id_master_unit: {
                required: "Unit harus diisi.",
            },              
            id_master_jabatan: {
                required: "Jabatan harus diisi.",
            },
            nama_lengkap: {
               required: "Nama lengkap harus diisi.",
            },
            tempat_lahir: {
               required: "Tempat lahir harus diisi.",
            },
            tanggal_lahir: {
               required: "Tanggal lahir harus diisi.",
            },
            agama: {
               required: "Agama harus diisi.",
            },
            anak_ke: {
               required: "Anda anak ke berapa ?",
            },
            jumlah_saudara: {
               required: "Dari berapa bersaudara ?",
            },
            alamat_domisili: {
               required: "Dimana ada bertempat tinggal saat ini ?",
            },
            handphone: {
                required: "No. handphone harus diisi.",
                number: "No. handphone tidak valid.",
            },
            no_ktp: {
                required: "No. KTP harus diisi.",
                number: "No. KTP tidak valid.",
            },
            ktp_dikeluarkan_di: {
                required: "KTP dikeluarkan di mana ?",
            },
            // masa_berlaku_ktp: {
            //     required: "Masa berlaku KTP harus diisi.",
            // },
            // ortu
            nama_ayah: {
                required: "Siapa nama Ayah Anda ?",
            },
            alamat_rumah_ayah: {
                required: "Dimana alamat rumah Ayah Anda ?",
            },
            nama_ibu: {
                required: "Siapa nama Ibu Anda ?",
            },
            alamat_rumah_ibu: {
                required: "Dimana alamat rumah Ibu Anda ?",
            },
        }
    });


    // $("#form-questions").validate({
    //     rules: {
    //         jawaban[]: {
    //             required: true,
    //         },
    //     },
    //     messages: { 
    //         jawaban[]: {
    //             required: "Jawaban harus diisi.",
    //         },              
    //     }
    // });


});