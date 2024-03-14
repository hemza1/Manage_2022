<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formagency2.css">
    <title>Document</title>
</head>
<body>
<section>
  <div class="container">
    <form>
        
      <div class="step step-1 active">
          <div class="header">
          <span class="close">&times;</span>
          </div>
        <h1>We'll ask you the right questions so we can introduce you to the right agencies.</h1>
        <button type="button" class="next-btn">Next</button>
      </div>

      <div class="step step-2">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="number" id="phone" name="phone-number">
        </div>
        <button type="button" class="previous-btn">Prev</button>
        <button type="button" class="next-btn">Next</button>
      </div>

      <div class="step step-3">
        <div class="form-group">
          <label for="country">country</label>
          <input type="text" id="country" name="country">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city" name="city">
        </div>
        <div class="form-group">
          <label for="postCode">Post Code</label>
          <input type="text" id="postCode" name="post-code">
        </div>
        <button type="button" class="previous-btn">Prev</button>
        <button type="submit" class="next-btn">next</button>
      </div>
      <div class="step step-4">
        <div class="form-group">
          <label for="country">country</label>
          <input type="text" id="country" name="country">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city" name="city">
        </div>
        <div class="form-group">
          <label for="postCode">Post Code</label>
          <input type="text" id="postCode" name="post-code">
        </div>
        <button type="button" class="previous-btn">Prev</button>
        <button type="submit" class="submit-btn">Submit</button>
      </div>

    </form>
  </div>
</section>
<script src="formagency2.js"></script>
</body>
</html>