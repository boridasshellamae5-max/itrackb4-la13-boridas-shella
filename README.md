LA11 — Movies 

G1 — Route Model Binding
Needs two things: (1) the parameter is type-hinted with the model class, and (2) the parameter name exactly matches the route segment (e.g. `{movie}` → `$movie`). If only the type-hint is correct but the name doesn't match, no record loads and there is no error — the parameter stays empty or finds nothing.
 G2 — Delete Link 404
The address was correct because Laravel generates it properly, but a link sends a **GET** request while the `destroy` route only answers **DELETE**. The method verb matters as much as the URL itself.
 G3 — old() Second Argument
If left out, the form stays blank after a failed submit — nothing fills in. If used alone without `old()` as the first value, the form always shows the original database value even after a failed edit — the user's typed changes disappear. Using both keeps their input visible when validation fails.