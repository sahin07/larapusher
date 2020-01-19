
Components
/
Footer
Footers
The v-footer component is used for displaying general information that a user might want to access from any page within your site.

ads via Carbon
Shutterstock Free Trial - 10 Free Images. Join Now!
ads via Carbon
Usage
The v-footer component in its simplest form is a container.

© 2020
API
Select your desired component from below and see the available props, slots, events and functions.

​
Available Component(s)
v-footer
​
Search...
Name
absolute
Type
boolean
Default
false
Description
Applies position: absolute to the component.

Name
app
Type
boolean
Default
false
Description
Designates the component as part of the application layout. Used for dynamically adjusting content sizing. Components using this prop should reside outside of v-content component to function properly. You can more information about layouts on the application page.

Name
color
Type
string
Default
undefined
Description
Applies specified color to the control - it can be the name of material color (for example success or purple) or css color (#033 or rgba(255, 0, 0, 0.5)). You can find list of built in classes on the colors page.

Name
dark
Type
boolean
Default
false
Description
Applies the dark theme variant to the component. You can find more information on the Material Design documentation for dark themes.

Name
elevation
Type
number | string
Default
undefined
Description
Designates an elevation applied to the component between 0 and 24. You can find more information on the elevation page.

Name
fixed
Type
boolean
Default
false
Description
Applies position: fixed to the component.

Name
height
Type
number | string
Default
auto
Description
Sets the height for the component.

Name
inset
Type
boolean
Default
false
Description
Positions the toolbar offset from an application v-navigation-drawer

Name
light
Type
boolean
Default
false
Description
Applies the light theme variant to the component.

Name
max-height
Type
number | string
Default
undefined
Description
Sets the maximum height for the component.

Name
max-width
Type
number | string
Default
undefined
Description
Sets the maximum width for the component.

Name
min-height
Type
number | string
Default
undefined
Description
Sets the minimum height for the component.

Name
min-width
Type
number | string
Default
undefined
Description
Sets the minimum width for the component.

Name
padless
Type
boolean
Default
false
Description
Remove all padding from the footer

Name
tag
Type
string
Default
'div'
Description
Specify a custom tag used on the root element.

Name
tile
Type
boolean
Default
true
Description
Removes the component's border-radius.

Name
width
Type
number | string
Default
undefined
Description
Sets the width for the component.

Playground
2020 — Vuetify
Variant
default
Examples
Below is a collection of simple to complex examples.

Absolute Footer
The absolute prop positions footers absolutely at the bottom of their parent container.

<template>
  <v-card height="150">
    <v-footer
      absolute
      class="font-weight-medium"
    >
      <v-col
        class="text-center"
        cols="12"
      >
        {{ new Date().getFullYear() }} — <strong>LaraPusher</strong>
      </v-col>
    </v-footer>
  </v-card>
</template>

<script>
export default {

}
</script>
