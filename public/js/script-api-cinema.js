const APIMOVIE         = '20c7b8d480d4a435703ad88460e996a5';
const URLAPIMOVIE = `https://api.themoviedb.org/3/search/movie?api_key=${APIMOVIE}&language=fr&region=FR&include_image_language=fr&query=`;
const AFFICHESDIRECTORY = 'https://image.tmdb.org/t/p/w500';

// console.log(URLAPIMOVIE);


let rechercherFilm = (titre, callback, page = 1) => {
    fetch(URLAPIMOVIE + titre + '&page=' + page)
        .then(reponse => reponse.json())
        .then(datas => callback(datas))
        .catch(error => console.log(error));
};

let detailsFilm = (idFilm, callback) => {
    fetch(`https://api.themoviedb.org/3/movie/${idFilm}?api_key=${APIMOVIE}&language=fr&region=FR&include_image_language=fr`)
        .then(reponse => reponse.json())
        .then(datas => callback(datas))
        .catch(error => console.log(error));
};

let creditFilm = (idFilm, callback) => {
    fetch(`https://api.themoviedb.org/3/movie/${idFilm}/credits?api_key=${APIMOVIE}&language=fr&region=FR&include_image_language=fr`)
        .then(reponse => reponse.json())
        .then(datas => callback(datas))
        .catch(error => console.log(error));
};

let titre        = document.querySelector('#film_titre');
let synopsis     = document.querySelector('#film_synopsis');
let pays         = document.querySelector('#film_pays');
let casting      = document.querySelector('#film_casting');
let duree        = document.querySelector('#film_duree');
let recompenses  = document.querySelector('#film_recompense');
let realisation  = document.querySelector('#film_realisation');
let distributeur = document.querySelector('#film_distributeur');
let coutLocation = document.querySelector('#film_coutLocation');

// si l'input qui à l'ID recherche existe alors
if (document.getElementById('recherche')) {

    // je selectionne le bouton qui à l'ID lancerRecherche et je lui ajoute un ecouteur d'evenement de type click
    document.getElementById('lancerRecherche').addEventListener('click', () => {
        // je creer une variable raccourcis qui va récuperer la demande de l'utilisateur dans filmARechercher
        // à l'intérieur de recherche je cherche sa valeur (value), trim sert à retirer les espaces parasites
        let filmARechercher = document.getElementById('recherche').value.trim();
            // J'appel la function rechercherFilm qui a en parametre filmARechercher, et une fonction de callback qui va récuperer les datas
            rechercherFilm(filmARechercher, (datas) => {
                //je regarde ce que me renvoie l'API
                console.log(datas);
                // Je vide ma div resulat (si une demande à déja etait faite)
                document.getElementById('resultats').innerHTML= '';
                //si j'ai un resulat, (si j'ai des datas)
                if(datas.total_results > 0){
                    //J'affiche les données que je souhaite, je fait une boucle
                    // Si i=0 et si i est < au nombre de resultats(datas.results.length(la taille du tableau)) alors on boucle et on ajoute 1 à i
                    for(let i=0; i < datas.results.length; i++){
                        // Je creer une div
                        let ficheFilm = document.createElement('div');
                        // Dans cette div je met le titre
                        ficheFilm.innerHTML = datas.results[i].title;
                        // j'ajoute la classe fiche_film a mes div
                        ficheFilm.classList.add('fiche_film');

                        // je recupére les datas via la fonction detailsFilm
                        // j'ajoute un evenement click a ma div ficheFilm
                        ficheFilm.addEventListener('click', ()=>{
                            
                            // j'exécute la fonction detailsFilm avec l'id des films dans datas.result et je stock le resultat dans detailsDatas
                            detailsFilm(datas.results[i].id, (detailsDatas) => {
                                console.log(detailsDatas);
                                // je stock la donnée que je veux dans une variable
                                let titreFilm = detailsDatas.title;
                                //j'ajoute un attribut "value" à l'imput ciblé, puis j'y insére ma donnée
                                titre.setAttribute("value", titreFilm);
                                let synopsisFilm = detailsDatas.overview;
                                synopsis.innerHTML = synopsisFilm;
                                let dureeFilm = detailsDatas.runtime;
                                duree.setAttribute("value", dureeFilm);
                                // pour ajouter tout les pays, je creer une variable paysFilm vide
                                let paysFilm = "";
                                // je fait une boucle qui parcours le tableau des pays
                                for (let i=0; i <= detailsDatas.production_countries.length-1; i++){
                                    // je concatene les pays séparé par une virgule
                                    paysFilm = paysFilm + ", " + detailsDatas.production_countries[i].name;
                                    // console.log(paysFilm);
                                }
                                // je retire  les deux premier caractère pour retirer la virgule et l'espace du debut
                                paysFilm = paysFilm.substring(1,paysFilm.length);
                                pays.setAttribute("value", paysFilm);
                                
                            });

                            creditFilm(datas.results[i].id, (creditsDatas) => {
                                console.log(creditsDatas)
                                // j'affiche les 4 premier acteurs si ils existent
                                let limite = 4;
                                if (creditsDatas.cast.length-1 < limite) {
                                    limite = creditsDatas.cast.length-1;
                                }
                                let castingFilm = '';
                                for (let i=0; i < limite; i++){
                                castingFilm = castingFilm + ', ' + creditsDatas.cast[i].name;
                                }
                                castingFilm = castingFilm.substring(1, castingFilm.length);
                                console.log(castingFilm);
                                
                                let realisationFilm = '';
                                if (creditsDatas.crew[0] != null){
                                    realisationFilm = creditsDatas.crew[0].name;

                                }
                                casting.setAttribute("value", castingFilm);
                                realisation.setAttribute("value", realisationFilm);
                            })
                            
                        })
                        
                        //si il n'y a pas d'affiche, on rend une image, image not found
                        if(datas.results[i].poster_path != null){
                            //Je creer l'image, qui est un element de type img que j'ajoute au DOM
                            let affiche = document.createElement('img');
                            // j'u ajoute un attribut src, la source est composé de la constante AFFICHESDIRECTORY concaténé a poster_path 
                            affiche.setAttribute('src', AFFICHESDIRECTORY + datas.results[i].poster_path);
                            // j'ajoute cette image à la fiche 
                            ficheFilm.appendChild(affiche);
                        }else{
                            let affiche = document.createElement('img');
                            affiche.setAttribute('src', "../image/no-image-found.jpeg");
                            ficheFilm.appendChild(affiche);
                        }
                        // Cet div je l'ajoute à ma div résulstat
                        document.getElementById('resultats').appendChild(ficheFilm);

                        // let filmChoisit = document.
                    }
                } else {
                    // Si non j'affiche dans resultat, Pas de films trouvé
                    document.getElementById('resutats').innerHTML='Pas de films trouvé';
                }
            });
    
    });


    }

    