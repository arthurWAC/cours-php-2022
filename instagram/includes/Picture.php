<?php

class Picture implements \Stringable
{
    // Constantes -------------------
    public const FILTERS = ['moon', 'lark', 'juno', 'aden', 'rise', 'sierra', 'valencia'];

    // Attributs ou propriétés -------
    private string $url;
    private string $filter;
    private string $date;

    // Constructeur ------------------
    public function __construct(string $url, string $filter, ?string $date = null)
    {
        if ($date === null) {
            $date = date('Y-m-d');
        }

        if (!in_array($filter, self::FILTERS)) {
            die('Erreur : Filtre inconnu');
        }

        if (!$this->controlFormatDate($date)) {
            die('Erreur : Format date incorrect');
        }

        $this->url = $url;
        $this->filter = $filter;
        $this->date = $date;
    }

    // Méthodes spécifiques ----------
    private function controlFormatDate(string $date): bool
    {
        // Avec une expression régulière
        return preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $date);
    }

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getDate(?string $format = null): string
    {
        if ($format === null) {
            return $this->date;
        }

        return date($format, strtotime($this->date));
    }

    public function getHtmlImg(): string
    {
        return '<p class="mb-0"><img src="'. $this->url .'" class="img-fluid img-thumbnail" /></p>';
    }

    public function getHtmlLabel(): string
    {
        return '<p><small>Filtre <b>'. $this->filter .'</b> le ' . $this->getDate('d/m/Y') . '</small></p>';
    }

    // Méthode magique qui va s'appeler quand j'essaye de considérer mon objet comme
    // une chaine de caractères
    // => echo $picture
    public function __toString(): string
    {
        return $this->getHtmlImg() . $this->getHtmlLabel();
    }
}