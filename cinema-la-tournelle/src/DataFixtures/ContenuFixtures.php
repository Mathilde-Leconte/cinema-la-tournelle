<?php

namespace App\DataFixtures;

use App\Entity\ContenuFrontInfo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $contenu = new ContenuFrontInfo();
        $contenu -> setTitre('Cinéma la tournelle');
        $contenu -> setTexte('Le cinéma de proximité, le Cinéma La Tournelle
        est un établissement public proposant au moins
        trois films d’actualité par semaine : deux films
        tout public et un film KinoKids (programmation
        jeune public). Équipement intercommunal, la salle est classée
        « Art et Essai », labellisée jeune public avec
        266 fauteuils, des projections en 3D et une
        salle numérisée. Le cinéma est accessible aux personnes
        handicapées et possède une boucle sonore pour
        les personnes malentendantes appareillées.');
        $contenu -> setImage('la-tournelle-salle.jpeg');
        $contenu -> setEmplacement('espace1');
        $contenu -> setIsActive(true);
        $manager->persist($contenu);
                
        $contenu = new ContenuFrontInfo();
        $contenu -> setTitre('Tarifs');
        $contenu -> setTexte('bhdhgjdhkugdejklh');
        // $contenu -> setImage();
        $contenu -> setEmplacement('espace2');
        $contenu -> setIsActive(true);
        $manager->persist($contenu);
                
        $contenu = new ContenuFrontInfo();
        $contenu -> setTitre('Les séances cinététines');
        $contenu -> setTexte('Les plus petits aussi ont droit à leur
        séance. Ponctuellement, des films courts,
        destinés aux enfants de 18 mois à
        3 ans, leur permettent d’être
        initiés au 7e art, en toute confiance.');
        // $contenu -> setImage('');
        $contenu -> setEmplacement('espace3');
        $contenu -> setIsActive(true);
        $manager->persist($contenu);
                
        $contenu = new ContenuFrontInfo();
        $contenu -> setTitre('Les dispositifs pédagogiques');
        $contenu -> setTexte('Une mission pédagogique est également
        menée en partenariat avec l’Éducation
        Nationale dans le cadre de dispositifs
        d’éducation à l’image (École et Cinéma, Collège
        au Cinéma, Festival Ciné Junior),
        ou de séances « à la carte » spécifiquement
        réservées aux scolaires.');
        // $contenu -> setImage();
        $contenu -> setEmplacement('espace4');
        $contenu -> setIsActive(true);
        $manager->persist($contenu);
                
        $contenu = new ContenuFrontInfo();
        $contenu -> setTitre('Les événements');
        $contenu -> setTexte('Afin de créer des rencontres particulières avec le public, le
        Cinéma La Tournelle conduit régulièrement des actions
        spécifiques en participant aux événements nationaux
        (Fête du Cinéma, Printemps du Cinéma...), internationaux
        (Journée Internationale des Droits des Femmes, Journée des
        Droits de l’Enfant...), à des festivals (Ciné Regards Africains,
        le Jour le Plus Court...), en proposant des soirées culturelles
        thématiques (culture du monde, danse, musique, environnement,
        photo...) souvent accompagnées d’animations et de rencontres.
        Depuis 2015, le cinéma est la salle référente du Val-de-Marne
        pour la compétition francilienne de courts métrages
        « Ça tourne en Île-de-France » organisée par le festival
        Courts devant Paris Île-de-France.');
        $contenu -> setImage('evenement-latournelle.jpeg');
        $contenu -> setEmplacement('espace5');
        $contenu -> setIsActive(true);
        $manager->persist($contenu);
                
        $contenu = new ContenuFrontInfo();
        $contenu -> setTitre('test');
        $contenu -> setTexte('ceci est un teste');
        // $contenu -> setImage();
        $contenu -> setEmplacement('espace2');
        $contenu -> setIsActive(false);
        $manager->persist($contenu);

        $manager->flush();
    }
}
