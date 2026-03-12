// $(function(){
//     $(document).on('click', '#delete', function(e){
//         e.preventDefault();
//         var form =  $(this).closest("form");

//         Swal.fire({
//             title: "Are you sure?",
//             text: "You won't be able to revert this!",
//             icon: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#3085d6",
//             cancelButtonColor: "#d33",
//             confirmButtonText: "Yes, delete it!"
//           }).then((result) => {
//             if (result.isConfirmed) {
//               Swal.fire({
//                 title: "Deleted!",
//                 text: "Your file has been deleted.",
//                 icon: "success"
//               });
//             }
//           });
//     })
// })

// $(document).ready(function() {
//     $(document).on('click', '#delete', function(event){
//         var form =  $(this).closest("form");

//         event.preventDefault();
//         Swal.fire({
//             title: "Apakah kamu yakin?",
//             text: "Kamu tidak akan bisa mengemblikan proses ini.",
//             icon: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#3085d6",
//             cancelButtonColor: "#d33",
//             confirmButtonText: "Ya, hapus data ini!"
//           }).then((willDelete) => {
//             if (willDelete) {
//                 form.submit();
//             }
//         });
//     });
// });

// Versi lama
$(document).ready(function() {
    $(document).on('click', '#delete', function(event){
        var form =  $(this).closest("form");

        event.preventDefault();
        swal({
            title: "Apakah kamu yakin mau menghaous data ini?",
            text: "Jika kamu menghapus data ini, data ini akan hilang selamanya.",
            icon: "warning",
            type: "warning",
            buttons: ["Batal","Hapus"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
});
