# FEUERWASSER RandomString (frwssr_randomstring)
A field type to generate a (pseudo-)random string in [PerchCMS](https://grabaperch.com/).  
Use this as a supplement to/replacement for the Perch-native `slug` field type, if you need a randomly generated slug, for instance.

## Installation

1. Download zip archive and extract locally.
2. Create a `frwssr_randomstring` folder in the `/perch/addons/fieldtypes/` folder of your perch install.
3. Copy the file `frwssr_randomstring.class.php` to the `/perch/addons/fieldtypes/frwssr_randomstring` folder.

## Usage
In a perch template, you can use this field type as follows:
```html
<perch:content id="random" type="frwssr_randomstring">
```

### Attributes
- *style* - Choose between `alphabetic`, `numeric`, and `alphanumeric` characters. Defaults to `alphanumeric`.
- *case* - Determin whether `lowercase` or `uppercase` letters should be used—or if they should be `mixed`. This only comes into effect, when the `style` attribute is set to `alphabetic` or `alphanumeric`—or is omitted altogether. Defaults to `mixed`.
- *length* - Set the desired string length. Defaults to `8`.
- *prefix* - Define a string to be prepended to your randomly generated strings.
- *postfix* - Define a string to be appended to your randomly generated strings.
- *editable* - In case you need the field to be editable, just add this boolean attribute—no value required. Be careful with this one, though. You don’t want to break URLs, that are making use of your random strings, or something.

### Example
```html
<perch:content id="random" type="frwssr_randomstring" style="alpha" case="mixed" length="11" label="A random string">
```

### Notes
- By default the fieldtype is `readonly` to prevent users from accidentally changing the value.
- This fieldtype was developed under Perch (Standard) Version 3.1.7 on a server running PHP 7.4.x.  
**Use at own risk!**


# License
This project is free, open source, and GPL friendly. You can use it for commercial projects, for open source projects, or for almost whatever you want, really.

# Donations
This is free software, but it took some time to develop. If you use it, please let me know—I live off of positive feedback…and chocolate.
If you appreciate the fieldtype and use it regularly, feel free to [buy me some sweets](https://paypal.me/nlsmlk).

# Issues
Create a GitHub Issue: https://github.com/frwssr/frwssr_randomstring/issues or better yet become a contributor.

Developer: Nils Mielke (nils.m@feuerwasser.de, [@nilsmielke](https://twitter.com/nilsmielke)) of [FEUERWASSER](https://www.feuerwasser.de) ([@frwssr](https://twitter.com/frwssr))