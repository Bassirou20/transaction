let expediteur_input: HTMLInputElement|null=document.querySelector('#expediteur')
let expediNom_input:HTMLInputElement|null=document.querySelector('#nomexpedi')
 let destinataire_input:HTMLInputElement|null=document.querySelector('#destinaire')
 let nom_desti:HTMLInputElement|null=document.querySelector('#nom_desti')
 let montant:HTMLInputElement|null=document.querySelector('#montant')
let bouton_info=document.querySelector('.info')
const select_fournisseurs: HTMLSelectElement | null = document.querySelector('#fournisseurs');
const bouton:HTMLButtonElement|null=document.querySelector('button')

if (select_fournisseurs) { // Vérifiez si select_fournisseurs est non null (s'il a été trouvé dans le DOM)
    select_fournisseurs.addEventListener('change', async () => {

        const getFournisseurs = "http://localhost:8000/samaKoppar/comptes";

        try {
            const response = await fetch(getFournisseurs, {
                method:'GET',
                headers: {
                    'mode': 'no-cors', 
                    'Content-Type': 'application/json'
                }
            });
            const data = await response.json();
            console.log(data);

            const select_discipline = document.getElementById('discipline') as HTMLSelectElement; // Assurez-vous que select_discipline est correctement typé

            // Nettoyer les options précédentes avant d'ajouter de nouvelles options
            select_fournisseurs.innerHTML = '';

            data.forEach((element: any) => { // Assurez-vous de définir correctement le type de "element" (comme "any" ici)
                let option = document.createElement('option');
                option.innerHTML = element.nom_disc;
                option.value = element.id_disc; // Assurez-vous de définir la valeur appropriée pour l'option
                select_fournisseurs.appendChild(option);
            });
        } catch (error) {
            console.error('Erreur lors de la récupération des données depuis l\'API :', error);
        }
    });
}
    bouton_info?.addEventListener('click',()=>{
        console.log('jbcdcbdzcd');
    const modal = document.getElementById('modal');
    if (modal) {
        modal.style.display = 'block'; // Afficher le modal en changeant la propriété "display" à "block"
    }

    })
// bouton.addEventListener('click',()=>{
// expediNom_input?.value=null
// expediteur_input?.value=null
// nom_desti?.value=null
// destinataire_input?.value=null
// montant?.value=null
// })