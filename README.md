 itrackb4-la10-books-genres

 G1 — Which column did you turn into a table, and why?
I turned the `genre` column into its own `genres` table. Genres are a fixed list of values that repeat across many books, and they make sense as a separate group that I might want to add details to later. Other columns like title, author, and year are unique or descriptive of each book individually, so they stayed in the books table.
 G2 — What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed **6 queries**. It ran 1 query to get all books, then 1 separate query for every single book to look up its genre name — 5 books means 5 extra lookups, so 1 + 5 = 6 total. That is the N+1 problem.

G3 — Your belongsTo method is named in the singular. What would break if you made it plural?
If I named the method `genres()` instead of `genre()`, Eloquent would automatically search for a column called `genres_id` which does not exist in my table. The relationship would fail and throw an error because it cannot find the expected foreign key column.