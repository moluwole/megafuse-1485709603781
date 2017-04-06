###
  This script is meant for Megafuse Official Website
###
$ ->
  $('.menu').click () ->
    $('.sidebar-menu').css 'width', '300px'
    return false

  $('.close-all').click () ->
    $('.sidebar-menu').css 'width', '0px'
    return false
