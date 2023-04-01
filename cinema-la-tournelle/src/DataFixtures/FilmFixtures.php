<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FilmFixtures extends Fixture
{
    public const CINQUIEME_ELEMENT  = "Le cinquieme element";
    public const UNDERWORLD         = "Underworld";
    public const INDIANA            = "Indiana";
    public const GOSSES             = "Gosses";
    public const RABBIT             = "Rabbit";

    public function load(ObjectManager $manager,): void
    {
        $film = new Film();
        $film -> setTitre("Le cinquième élément");
        $film -> setRealisation("Luc BESSON");
        $film -> setCasting("Bruce Willis, Gary Oldam, Milla Jovovich");
        $film -> setPays("Etat-unis");
        $film -> setDuree(125);
        $film -> setSynopsis("Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l'humanité.");
        $film -> setRecompense("César 1998: Meilleur réalisation, Meilleur photographie, Meilleur décors", "", "");
        $film -> setDistributeur("MMmmh c'est cela oui");
        $film -> setCoutLocation("50%");
        $film -> setVoFilm(true);
        $film -> setVostFilm(true);
        $film -> setDeuxDFilm(true);
        $film -> setTroisDFilm(false);
        $film -> setAPartir(false);
        $film -> setinterditAns(false);
        $film -> setAPartirMois(FALSE);
        $film -> setIsActive(FALSE);
        $manager->persist($film);
        $this->addReference(self::CINQUIEME_ELEMENT, $film);


        $film = new Film();
        $film -> setTitre("Underworld");
        $film -> setRealisation("Len Wiseman");
        $film -> setCasting("Kate Beckinsale, Scott Speedman, Bill Nighy");
        $film -> setPays("Etat-unis");
        $film -> setDuree(121);
        $film -> setSynopsis("Selene est une guerrière vampire puissante. Dans la lutte qui oppose depuis des siècles son peuple à celui des Lycans, des loups-garous, elle est reconnue pour être l'une des tueuses les plus efficaces. Jusqu'au jour où elle tombe amoureuse de Michael Corvin, un humain qui se retrouve pris malgré lui dans l'affrontement des deux clans. Mordu par l'un des loups-garous, il devient rapidement l'un d'entre eux. Entre passion et devoir, Selene doit alors choisir son camp...");
        $film -> setRecompense('');
        $film -> setDistributeur("MMmmh c'est cela oui");
        $film -> setCoutLocation("50%");
        $film -> setVoFilm(true);
        $film -> setVostFilm(false);
        $film -> setDeuxDFilm(true);
        $film -> setTroisDFilm(false);
        $film -> setAge(12);
        $film -> setAPartir(false);
        $film -> setinterditAns(true);
        $film -> setAPartirMois(false);
        $film -> setIsActive(true);
        $manager->persist($film);
        $this->addReference(self::UNDERWORLD, $film);


        
        $film = new Film();
        $film -> setTitre("INDIANA JONES ET LE ROYAUME DU CRÂNE DE CRISTAL");
        $film -> setRealisation("Steven Spielberg");
        $film -> setCasting("Harrison Ford, Shia LaBeouf, Karen Allen");
        $film -> setPays("Etat-unis");
        $film -> setDuree(123);
        $film -> setSynopsis("La nouvelle aventure d'Indiana Jones débute dans un désert du sud-ouest des Etats-Unis. Nous sommes en 1957, en pleine Guerre Froide. Indy et son copain Mac viennent tout juste d'échapper à une bande d'agents soviétiques à la recherche d'une mystérieuse relique surgie du fond des temps. De retour au Marshall College, le Professeur Jones apprend une très mauvaise nouvelle : ses récentes activités l'ont rendu suspect aux yeux du gouvernement américain. Le doyen Stanforth, qui est aussi un proche ami, se voit contraint de le licencier. A la sortie de la ville, Indiana fait la connaissance d'un jeune motard rebelle, Mutt, qui lui fait une proposition inattendue. En échange de son aide, il le mettra sur la piste du Crâne de Cristal d'Akator, relique mystérieuse qui suscite depuis des siècles autant de fascination que de craintes. Ce serait à coup sûr la plus belle trouvaille de l'histoire de l'archéologie. Indy et Mutt font route vers le Pérou, terre de mystères et de superstitions, où tant d'explorateurs ont trouvé la mort ou sombré dans la folie, à la recherche d'hypothétiques et insaisissables trésors. Mais ils réalisent très vite qu'ils ne sont pas seuls dans leur quête : les agents soviétiques sont eux aussi à la recherche du Crâne de Cristal, car il est dit que celui qui possède le Crâne et en déchiffre les énigmes s'assure du même coup le contrôle absolu de l'univers. Le chef de cette bande est la cruelle et somptueuse Irina Spalko. Indy n'aura jamais d'ennemie plus implacable... Indy et Mutt réuissiront-ils à semer leurs poursuivants, à déjouer les pièges de leurs faux amis et surtout à éviter que le Crâne de Cristal ne tombe entre les mains avides d'Irina et ses sinistres sbires ?");
        $film -> setRecompense("Razziz Awards 2009");
        $film -> setDistributeur('MMmmh c\'est cela oui');
        $film -> setCoutLocation('50%');
        $film -> setVoFilm(true);
        $film -> setVostFilm(false);
        $film -> setDeuxDFilm(true);
        $film -> setTroisDFilm(true);
        // $film -> setAge(0);
        $film -> setAPartir(false);
        $film -> setinterditAns(false);
        $film -> setAPartirMois(false);
        $film -> setIsActive(true);
        $manager->persist($film);
        $this->addReference(self::INDIANA, $film);



        $film = new Film();
        $film -> setTitre("CHÉRIE, J'AI RÉTRÉCI LES GOSSES");
        $film -> setRealisation("Joe Johnston");
        $film -> setCasting("Rick Moranis, Marcia Strassman, Robert Oliveri");
        $film -> setPays("Etat-unis");
        $film -> setDuree(94);
        $film -> setSynopsis("Le facétieux professeur Wayne Szalinski a encore transformé sa maison en un vaste laboratoire et sa famille en cobayes. Sa dernière trouvaille: un rayon laser capable de rétrécir les objets. Ses enfants, Amy et Nick ainsi que leurs copains Ron et Russ en font malencontreusement l’expérience. Les voici réduits a la taille du Petit Poucet, confrontés a la jungle du jardin ou le moindre brin d'herbe prend des allures de baobab.");
        $film -> setRecompense("BAFTA Awards / Orange British Academy Fillm Awards 1991");
        $film -> setDistributeur('MMmmh c\'est cela oui');
        $film -> setCoutLocation('50%');
        $film -> setVoFilm(true);
        $film -> setVostFilm(false);
        $film -> setDeuxDFilm(true);
        $film -> setTroisDFilm(false);
        $film -> setAge(12);
        $film -> setAPartir(true);
        $film -> setinterditAns(false);
        $film -> setAPartirMois(false);
        $film -> setIsActive(FALSE);
        $manager->persist($film);
        $this->addReference(self::GOSSES, $film);



        $film = new Film();
        $film -> setTitre("QUI VEUT LA PEAU DE ROGER RABBIT ?");
        $film -> setRealisation("Robert Zemeckis");
        $film -> setCasting("Bob Hoskins, Luq Hamett, Charles Fleischer");
        $film -> setPays("Etat-unis");
        $film -> setDuree(103);
        $film -> setSynopsis("Roger Rabbit est au trente-sixième dessous. Autrefois sacré star du cinéma d'animation, le lapin blanc est fortement préoccupé pendant les tournages depuis qu'il soupçonne sa femme, la sublime Jessica Rabbit, de le tromper. Le studio qui emploie Roger décide d'engager un privé, Eddie Valliant, pour découvrir ce qui se cache derrière cette histoire bien plus complexe qu'il n'y parait !");
        $film -> setRecompense("Oscars/ Academy Awards 1989: Meilleur montage, Meilleur montage sonore, Meilleur effet visuels");
        $film -> setDistributeur('MMmmh c\'est cela oui');
        $film -> setCoutLocation('50%');
        $film -> setVoFilm(true);
        $film -> setVostFilm(true);
        $film -> setDeuxDFilm(true);
        $film -> setTroisDFilm(false);
        // $film -> setAge();
        $film -> setAPartir(false);
        $film -> setinterditAns(false);
        $film -> setAPartirMois(false);
        $film -> setIsActive(true);
        $manager->persist($film);
        $this->addReference(self::RABBIT, $film);




        $manager->flush();
    }
}
