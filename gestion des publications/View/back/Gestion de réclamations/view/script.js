function verifierID(ID) {
    const regex = /^[a-z0-9]+$/;
    if (!regex.test(ID)) {
      const messageErreur = "L'ID ne peut contenir que des lettres minuscules et des nombres.";
      document.getElementById("message").textContent = messageErreur;
    }
  }

  if (!verifierID(ID))
  {$message = "MECH HAKKA !";}


  
