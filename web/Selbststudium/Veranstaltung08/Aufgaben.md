# Übung 8 Aufgaben
### Michael Höhn, Jan Humbel, Tobias Herrmann

# Aufgabe 5 
### Beschreiben Sie die User Interaktionen beim optimistischen locking. Als welche Fälle können auftreten und wie soll die Software darauf reagieren.

Beim optimistischen Locking wird die Resource beim ersten Zugriff nicht gelockt, sondern der Status der Resource wird gespeichert. Somit können andere Transaktionen immernoch auf die Resource zugreifen, dass kann jedoch zu Lost-Update/Repeatable-Read führen. Deshalb wird vor dem Update auf dem Persistenten Speicher die Resource erneut gelesen und mit der gespeicherten Version verglichen. Sollten die beiden Resourcen unterschiedlich sein wurde diese inzwischen geändert und ein Rollback der Transaktion wird durchgeführt.
* Conflicting Update: Es wird eine OptimisticLockException geworfen welche dem Benutzer auf dem UI zeigt das die Änderungen nicht gespeichert werden konnten. Die Software wird die Transaktion automatisch erneut durchführen sollte ein Fehler aufgetreten sein. Nach zuvielen Fehlern wird abgebrochen und dem User eine Meldung angezeigt.

# Aufgabe 6 
### Beschreiben Sie einen Deadlock

Ein Deadlock beschreibt einen Zustand, bei welchem zwei oder mehrere Datenbank Transaktionen auf die  jeweils andere Transaktion warten muss. Ein Deadlock kann bei InnoDB von MySQL zum Beispiel mittels einem Share Lock/Exlusive Lock entstehen.

#### Beispiel:
1. Client A startet eine Transaktion und selektiert eine Zeile im Share Lock Modus
2. Client B startet ebenfalls eine Transaktion und versucht die gleiche Zeile zu löschen, Um eine Zeile zu löschen wird ein Exclusive Lock benötigt, weil Client A schon ein Share Lock auf der Zeile anwendet, wird der Lock request von B in eine Warteschlange gelegt. 
3. Client A möchte ebenfalls die Zeile löschen. Dafür braucht A nun auch ein Exclusive Lock, welches aber schon von B in Anspruch genommen wird.

Ein Deadlock existiert nun auf der selektierten Zeile. Client A braucht ein Exclusive Lock um die Zeile zu löschen. Der Lock request kann jedoch nicht bewilligt werden, da Client B auch einen Exclusive Lock angefordert hat. Client B muss jedoch auf Client A warten, bis dieser den Share Lock aufhebt, welcher wiederum auf Client B wartet.

# Aufgabe 7
### Welche Probleme durch mangelnde Transaktionsisolation können durch ein optimistisches locking behoben werden?

* Lost update
* Non repeatable read
