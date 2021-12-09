@push('script')
<script src="{{ asset('js/onscan.min.js') }}"></script>
@endpush
 

<script>
try {
    onScan.attachTo(document, {
        suffixKeyCodes: [13],
        onScan: function(barcode){
            console.log(barcode)
            window.livewire.emit('scan-code', barcode)
        },
    })
    
    console.log('el escaner esta listo')
    
} catch (e) {
    console.log('error', e)  
}

</script>