    document.addEventListener('livewire:load', function () {
        Livewire.on('skattekasserUpdated', function (skattekasserCount) {

            document.getElementById('skattekasserCount').innerHTML = skattekasserCount;
        });
    });
