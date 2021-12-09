<x-admin-layout >
    <div >
        <div>
            @livewire('admin.create-category')
        </div>
    </div>


    {{-- sweetAlert 2 para eliminar categoria --}}
    @push('script')

   <script>
         
    livewire.on('deleteCategory', categorySlug => {
        Swal.fire({
        title: 'Estas seguro?',
        text: "No se vale arrepentir!",
        icon: 'warnin',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            livewire.emitTo('admin.create-category', 'delete', categorySlug)
            Swal.fire(
            'Eliminado',
            'La categoria ha sido eliminada',
            'success'
            )
        }
        })
    });
   </script>
   @endpush

</x-admin-layout>