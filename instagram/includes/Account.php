<?php
// Compte Instagram
class Account
{

	// Attributs
	public string $accountName;
	public int $nbFollowers;

	/**
	 * @var string[] $followers
	 */
	public array $followers;
	public int $nbFollows;

	/**
	 * @var string[] $follows
	 */
	public array $follows;
	public int $nbPictures;

	/**
	 * @var Picture[] $pictures
	 */
	public array $pictures;

	// Constructeur (= initialisation)
	public function __construct(string $nom)
	{
		// [1] Le constructeur permet d'initialiser le nom du compte, le nombre de followers à 0, et le nombre de comptes suivis à 0
		$this->accountName = $nom;

		// On initialise tout dans le constructeur
		$this->nbFollows = 0;
		$this->follows = [];

		$this->nbFollowers = 0;
		$this->followers = [];

		$this->nbPictures = 0;
		$this->pictures = [];
	}

	// [3] Créez 2 méthodes :
		// 	- 1 pour ajouter un nouveau follower (1 follower est défini par son nom)
		public function addFollower(string $nom): void
		{
			if (in_array($nom, $this->followers) === false) {
				$this->nbFollowers++;
				$this->followers[] = $nom;
			}
		}
		// 	- 1 pour ajouter un nouveau compte suivi (1 compte suivi est défini par son nom)
		public function addFollow(string $nom): void
		{
			if (in_array($nom, $this->follows)) {
				return;
			}
			
			$this->nbFollows++;
			$this->follows[] = $nom;
		}
		
		// Le nombre de followers et de comptes suivis doivent être mis à jour en même temps



	// [5] Nous allons maintenant ajouter des photos
	// 1 photo est définie par plusieurs informations : 
	//		- nom
	//		- filtre (filtres possibles : moon, lark, juno, aden, rise, sierra, valencia)
	//		- date de publication au format AAAA-MM-JJ (exemple 2019-01-01 pour le premier Janvier)
	
	// Indications :
	// 		- La fonction d'ajout aura donc 3 paramètres
	// 		- Une photo sera représentée par un tableau associatif, et "rangée" dans l'attribut $photos de l'objet
	//		- Le nombre de photos doit être mis à jour en même temps
		public function addPhoto(string $nom, string $filtre, ?string $date = null): void
		{
			$this->pictures[] = new Picture($nom, $filtre, $date);
			$this->nbPictures++;
		}


	// [7] Créez 3 méthodes "getteurs" :
		//	- 1 pour retourner la toute première photo postée
		//  - 1 pour retourner la toute dernière photo postée
		//  - 1 pour retourner la photo en position N (cette méthode aura donc un paramètre)
		public function getFirstPicture(): ?Picture
		{
			if (empty($this->pictures)) {
				return null;
			}

			return $this->pictures[array_key_first($this->pictures)];
		}

		public function getLastPicture(): ?Picture
		{
			if (empty($this->pictures)) {
				return null;
			}

			return $this->pictures[array_key_last($this->pictures)];
		}

		public function getPicture(int $position): ?Picture
		{
			return $this->pictures[$position] ?? null;
		}

	// [9] Créez une méthode récapitulative qui retourne au format HTML toutes les informations du compte :
		// Son nom
		// Le nombre de followers et leurs noms
		// Le nombre de comptes suivis et leurs noms
		// L'ensemble des photos postées



	// [11] Créer une méthode permettant de retourner toutes les photos comprises entre 2 dates différentes
}