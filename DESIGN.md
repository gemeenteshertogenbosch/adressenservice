Design Considerations

## Postcodes
When we recieve a postcode query we strip it of spaces, enters and tabs and capitilaze al letters before sending it to the bag API. Since the BAG is strict but we canot expect users to inpud valid P6 codes in forms.

## HuisnummerToevoeging
When we recieve a huisnummer toevoeging query we do not send it on to the bag, isntead we take the bag result and then add the huisnummer letter to the huisnummer toevoeging and compare against that in a non case sensitive manner. We do this becouse most webforms only use huisnummertoevoeging (and not huisnummer letter). Also the whole huisnummer letter is largly unknown to both users and systems outside of the bag. 