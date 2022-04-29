<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitsDrugTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produit = new \App\Models\Produit();
        $produit->nom="MDMA";
        $produit->prix_ht= 49;
        $produit->description="Le principe actif de l’ecstasy est la MDMA (méthylènedioxyméthamphétamine), molécule de la famille des amphétamines.A l’état brut l’ecstasy ressemble à des cristaux de couleur blanche mais il peut se présenter sous plusieurs formes :en comprimés de couleur incrustés d’un petit motif";
        $produit->photo_principale = "mdma.jpg";
        $produit->categorie_id = 2;
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom="4-MEC";
        $produit->prix_ht= 15;
        $produit->description="La 4-MEC (4-methylethcathinone) est une drogue de synthèse de la famille des cathinones. C’est un stimulant dont les effets sont proches de ceux de la MDMA/ecstasy";
        $produit->photo_principale = "4-mec.jpg";
        $produit->categorie_id = 2;
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom="Amphetamine";
        $produit->prix_ht= 12;
        $produit->description="Les amphétamines désignent une famille de substances stimulantes toutes dérivées de l’amphétamine et aux propriétés pharmacologiques proches. Les amphétamines sont vendues sous forme de poudre fine ou de poudre cristalline (blanche, rose, jaune), de cristaux ou de comprimés";
        $produit->photo_principale = "amphe.jpg";
        $produit->categorie_id = 1;
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom="Benzodiazepines";
        $produit->prix_ht= 6;
        $produit->description="Les benzodiazépines sont des médicaments psychotropes principalement prescrits pour traiter l’anxiété et l’insomnie. Elles agissent toutes de la même façon, mais elles ont des propriétés différentes en fonction de leur structure chimique";
        $produit->photo_principale = "benzo.jpg";
        $produit->categorie_id = 1;
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom="Cannabis";
        $produit->prix_ht= 10;
        $produit->description="Le cannabis est une plante : il se présente sous forme « d’herbe » (mélange de feuilles, de tiges et de fleurs séchées), de résine (obtenue en pressant les fleurs), de pollen, de concentrés (huile, cire, cristal, pâte)...Le principe actif responsable des effets du cannabis est le THC";
        $produit->photo_principale = "cannabis.jpg";
        $produit->categorie_id = 2;
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom="Champignons hallucinogenes";
        $produit->prix_ht= 20;
        $produit->description="Les champignons hallucinogènes constituent une famille de plantes comportant de nombreuses variétés dont la plus commune est le psilocybe";
        $produit->photo_principale = "champi.jpg";
        $produit->categorie_id = 3;
        $produit->save();
    }
}
