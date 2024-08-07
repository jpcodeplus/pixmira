# PixMira

PixMira ist eine Webanwendung zur Darstellung und Filterung von Karten basierend auf verschiedenen Kategorien. Die Anwendung umfasst Funktionen zur Anzeige von Kartendetails, Filteroptionen und eine saubere Benutzeroberfläche. Das Projekt verwendet PHP, um die Daten aus einer JSON-Datei zu laden und dynamisch HTML-Inhalte zu generieren.

## Projektstruktur

1. **`index.php`**: Die Hauptseite der Anwendung, die die Karten basierend auf den Daten aus `cards.json` anzeigt. Sie bietet auch eine Filterfunktion basierend auf Kategorien.
   
2. **`detail.php`**: Diese Seite zeigt die Details einer spezifischen Karte an, die über eine Seiten-ID (`page`) aufgerufen wird.

3. **`code/app.php`**: Enthält Klassen und Methoden für die Datenverarbeitung, das Sanitizen von Strings und das Abrufen von Inhalten von einer externen Webseite.

4. **`data/cards.json`**: Die JSON-Datei, die die Daten der Karten enthält, wie Titel, Datum, Kategorie und Link.

5. **`style.css`**: Das Haupt-CSS für die Gestaltung der Webseite.

6. **`reset.css`**: Ein CSS-Reset, um sicherzustellen, dass die Webseite in verschiedenen Browsern einheitlich dargestellt wird.

7. **`script.js`**: JavaScript-Datei, die Funktionen für die Interaktivität der Webseite bereitstellt, wie z.B. das Filtern der Karten.

8. **`README.md`**: Eine Datei, die das Projekt beschreibt und Anweisungen zur Installation und Nutzung enthält.

## cards.json

Die `cards.json` Datei enthält die Daten der Karten, die auf der Webseite angezeigt werden. Jede Karte hat bestimmte Attribute, die in der JSON-Datei als JSON-Objekte gespeichert sind.

### Beispielstruktur von `cards.json`:

```json
[
    {
        "title": "Karte 1",
        "date": "2023-08-01",
        "category": "Kategorie1",
        "link": "detail.php?page=thema-abc"
    },
    {
        "title": "Karte 2",
        "date": "2023-08-02",
        "category": "Kategorie2",
        "link": "detail.php?page=thema123"
    }
]

### Wichtig 🚨
Um die Links in deiner Anwendung so zu ändern, dass sie immer den Pixmira-Link verwenden, aber ohne die Domain angezeigt werden, kannst du den Link entsprechend anpassen. Dabei wird der Link von https://pixmira.com/thema123 zu detail.php?page=thema123 geändert.
