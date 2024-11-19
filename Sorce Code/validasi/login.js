// Event Listener untuk menangani form login
document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Mencegah form refresh halaman

  // Ambil nilai email dan password
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  // Validasi login (simulasi)
  if (validateLogin(email, password)) {
    alert("Login berhasil! Anda akan diarahkan ke homepage.");
    window.location.href = "homepage.html"; // Arahkan ke homepage
  } else {
    alert("Email atau password salah! Silakan coba lagi.");
  }
});

// Fungsi validasi login
function validateLogin(email, password) {
  // Contoh data login (statis)
  const validEmail = "panji@gmail.com";
  const validPassword = "panjiganteng123";

  // Validasi email dan password
  return email === validEmail && password === validPassword;
}
