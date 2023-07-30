"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
let expediteur_input = document.querySelector('#expediteur');
let expediNom_input = document.querySelector('#nomexpedi');
let destinataire_input = document.querySelector('#destinaire');
let nom_desti = document.querySelector('#nom_desti');
let montant = document.querySelector('#montant');
let bouton_info = document.querySelector('.info');
const select_fournisseurs = document.querySelector('#fournisseurs');
const bouton = document.querySelector('button');
if (select_fournisseurs) { // Vérifiez si select_fournisseurs est non null (s'il a été trouvé dans le DOM)
    select_fournisseurs.addEventListener('change', () => __awaiter(void 0, void 0, void 0, function* () {
        const getFournisseurs = "http://localhost:8000/samaKoppar/comptes";
        try {
            const response = yield fetch(getFournisseurs, {
                method: 'GET',
                headers: {
                    'mode': 'no-cors',
                    'Content-Type': 'application/json'
                }
            });
            const data = yield response.json();
            console.log(data);
            const select_discipline = document.getElementById('discipline'); // Assurez-vous que select_discipline est correctement typé
            // Nettoyer les options précédentes avant d'ajouter de nouvelles options
            select_fournisseurs.innerHTML = '';
            data.forEach((element) => {
                let option = document.createElement('option');
                option.innerHTML = element.nom_disc;
                option.value = element.id_disc; // Assurez-vous de définir la valeur appropriée pour l'option
                select_fournisseurs.appendChild(option);
            });
        }
        catch (error) {
            console.error('Erreur lors de la récupération des données depuis l\'API :', error);
        }
    }));
}
bouton_info === null || bouton_info === void 0 ? void 0 : bouton_info.addEventListener('click', () => {
    console.log('jbcdcbdzcd');
    const modal = document.getElementById('modal');
    if (modal) {
        modal.style.display = 'block'; // Afficher le modal en changeant la propriété "display" à "block"
    }
});
// bouton.addEventListener('click',()=>{
// expediNom_input?.value=null
// expediteur_input?.value=null
// nom_desti?.value=null
// destinataire_input?.value=null
// montant?.value=null
// })
