<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $article = new Article();
        $article->refArticle="001_KIT_RBPI3P";
        $article->Titre="DINOKA Raspberry Pi 3 Modèle B Plus (B+) Kit de démarrage";
        $article->Description= "avec carte micro SD 32 Go Classe 10, 
        alimentation marche/arrêt 5 V 2,5 A et 
        boîtier noir Premium 3 dissipateurs de chaleur en cuivre";
        $article->Categorie="Kit";
        $article->New='1';
        $article->Images="Images/Pack1";
        $article->Prix=1000.00;
        $article->QteDeStock=40;
        $article->save();

        $article = new Article();
        $article->refArticle="002_KIT_ARD";
        $article->Titre="Starter Kits for Arduino";
        $article->Description= "Arduino UNO R3 Nano V3.0 Mega 2560 Mega 328 Kit Project Kit Compatible with Arduino IDE";
        $article->Categorie="Kit";
        $article->New='0';
        $article->Images="Images/Pack2";
        $article->Prix=550.00;
        $article->QteDeStock=40;
        $article->save();

        //carte
        $article = new Article();
        $article->refArticle="003_CARTE_RBPI3P";
        $article->Titre="Raspberry Pi 3 Modèle B +";
        $article->Description= " Plaque de base, vert";
        $article->Categorie="Carte";
        $article->New='0';
        $article->Images="Images/Carte1";
        $article->Prix=650.00;
        $article->QteDeStock=40;
        $article->save();

        $article = new Article();
        $article->refArticle="004_CARTE_ARD";
        $article->Titre="ARDUINO UNO REV 3";
        $article->Description= "basée sur un ATMega328 cadencé à 16 MHz. 
        Des connecteurs situés sur les bords extérieurs du circuit imprimé 
        permettent d’enficher une série de modules complémentaires";
        $article->Categorie="Carte";
        $article->New='0';
        $article->Images="Images/Carte2";
        $article->Prix=105.00;
        $article->QteDeStock=40;
        $article->save();

        //Accessoire
        $article = new Article();
        $article->refArticle="005_ARE_RGB";
        $article->Titre="Ils - Kit 50 pièces LED RGB";
        $article->Description= "Common Cathode 4 Broches F5 5MM Diode";
        $article->Categorie="Accessoire";
        $article->New='0';
        $article->Images="Images/Accessoire1";
        $article->Prix=100.00;
        $article->QteDeStock=40;
        $article->save();

        $article = new Article();
        $article->refArticle="006_ARE_MPC";
        $article->Titre="Ensemble moteur pas à pas + carte de pilote";
        $article->Description= "Ensemble de Moteur Pas à Pas 5V et de Carte de Commande 
        ULN2003 28BYJ-48 Moteur Pas à Pas à 4 Phases pour Arduino";
        $article->Categorie="Accessoire";
        $article->New='1';
        $article->Images="Images/Accessoire2";
        $article->Prix=100.00;
        $article->QteDeStock=40;
        $article->save();
    }
}
