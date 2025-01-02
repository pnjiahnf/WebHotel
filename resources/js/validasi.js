document.getElementById('hotelForm').addEventListener('submit', function(e) {
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    if (!name || !address) {
        alert('Name and Address are required!');
        e.preventDefault();
    }
});

