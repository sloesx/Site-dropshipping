
const yearEl = document.getElementById("year");
if (yearEl) yearEl.textContent = String(new Date().getFullYear());


const form = document.getElementById("signupForm");
if (form) {
  const successBox = document.getElementById("successBox");

  const setError = (name, message) => {
    const el = document.querySelector(`[data-error-for="${name}"]`);
    if (el) el.textContent = message || "";
  };

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    ["email","country","password","confirm","postal","city","terms"].forEach(k => setError(k, ""));
    if (successBox) successBox.hidden = true;

    const email = form.email.value.trim();
    const country = form.country.value.trim();
    const password = form.password.value;
    const confirm = form.confirm.value;
    const postal = form.postal.value.trim();
    const city = form.city.value.trim();
    const terms = form.terms.checked;

    let ok = true;

    if (!email) { setError("email", "Veuillez entrer votre adresse e-mail."); ok = false; }
    else if (!/^\S+@\S+\.\S+$/.test(email)) { setError("email", "Adresse e-mail invalide."); ok = false; }

    if (!country) { setError("country", "Veuillez entrer votre pays."); ok = false; }

    if (!password) { setError("password", "Veuillez créer un mot de passe."); ok = false; }
    else if (password.length < 8) { setError("password", "Le mot de passe doit contenir au moins 8 caractères."); ok = false; }

    if (!confirm) { setError("confirm", "Veuillez confirmer le mot de passe."); ok = false; }
    else if (confirm !== password) { setError("confirm", "Les mots de passe ne correspondent pas."); ok = false; }

    if (!postal) { setError("postal", "Veuillez entrer votre code postal."); ok = false; }

    if (!city) { setError("city", "Veuillez entrer votre ville."); ok = false; }

    if (!terms) { setError("terms", "Vous devez accepter les conditions pour continuer."); ok = false; }

    if (!ok) return;

    if (successBox) successBox.hidden = false;
    form.reset();
  });
}
