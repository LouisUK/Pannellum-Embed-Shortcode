# WordPress Pannellum Embed

A simple WordPress shortcode that embeds the open source panorama viewer, Pannellum.

## Shortcode Parameters
| Attributes | Type | Description |
| ---------- |:----:| ------- |
| src        | URL | Panorama's URL |
| preview    | URL | Preview image URL displayed before panorama is used |
| player | URL | Defaults to local, but you can use Pannellum's CDN URL |
| width | iFrame Width | Defaults: 600 |
| height | iFrame Height | Defaults: 400 |
| autoload | True/False | Automatically loads the panorama |

## Example Shortcode
`[pannellum src="https://pannellum.org/images/cerro-toco-0.jpg"  autoload=true]`

### Install
Download and extract to your WordPress plugins directory

## Todo
- Move away from standalone viewer and use Pannellum's API

## Source
Pannellum - https://pannellum.org/
