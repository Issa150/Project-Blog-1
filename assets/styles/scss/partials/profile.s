@import "./base/Variables";
@import "./base/Reset";
@import "./partials/Nav";
@import "./mixin_functions/Mixins";

main.container {
  display: grid;
  grid-template-columns: max(160px, 20%) 1fr;
  position: relative;
  // grid-template-columns: repeat(auto-fill, minmax(max(160px,20%), 1fr));
  // gap: 2em;

  aside {
    // width: max(150px,30%);
    padding-top: 2em;

    h1,
    h2 {
      margin-left: 0.7em;
      margin-bottom: 0.7em;
    }

    ul {
      width: max-content;
      li {
        list-style: none;

        a {
          text-decoration: none;
          padding: 0.5rem 1rem;
          transition: 0.2s;
          border-left: 3px solid transparent;
          display: block;

          &:hover {
            border-left: 3px solid $clr_accent_1;
            background: rgba($clr_accent_1, 0.065);

            i {
              color: darken($clr_accent_1, 5%);
            }
          }
          &.active {
            border-left: 3px solid $clr_accent_1;
            background: rgba($clr_accent_1, 0.065);
          }

          i {
            margin-right: 10px;
            font-size: 1.3rem;
            color: rgb(61, 59, 59);
          }
        }
      }
    }
  }

  .info-detail {
    padding-top: 2em;
    margin-right: 1em;
    // background: linear-gradient(-60deg, #EEEEEE,rgb(246, 248, 227),#EEEEEE);
    padding: 1.7em;


    // main form contains the page!
    #editProfileform {

      .head-info {
        display: grid;
        grid-template-columns: auto 1fr;
        grid-template-rows: 1fr;
        align-items: end;
        gap: 2rem;
        height: 200px;
        margin-bottom: 3em;
        position: relative;

        // Image cover styles
        & > label,& > label > img {
          width: 100%;
          height: 100%;
          position: absolute;
          top: 0;
          left: 0;
        }

        // Profile styles
        // > div:has(label[for='profile-img']) {
        .profile-img {
          position: relative;
          margin-left: 1em;
          width: max-content;

          img {
            border: 5px solid white;
            width: 100px;
            border-radius: 50%;
            filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.185));
            cursor: pointer;
          }

          i {
            position: absolute;
            top: 80%;
            right: 5%;
            color: $clr_accent_1;
            cursor: pointer;
          }
        }

        // Adjust the overflow over next section
        & > div {
          margin-bottom: -2em;
          position: relative;
          // z-index: 2;
        }

        .user-info {
          background: linear-gradient(to top, $clr_grey, transparent);
          h3 {
            font-size: 2.5rem;
          }
        }
      }

      .body-info {
        @include form_1();
      }
    }
  }
}

@import "./partials/Footer";
