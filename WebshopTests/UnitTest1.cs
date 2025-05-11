using NUnit.Framework;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using System;

namespace WebshopTests
{
    [TestFixture]
    public class LoginRegisterTests
    {
        private IWebDriver driver;
        private WebDriverWait wait;
        private string baseUrl = "http://localhost:8000";

        [SetUp]
        public void Setup()
        {
            driver = new ChromeDriver();
            driver.Manage().Window.Maximize();
            wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
        }

        [Test]
        public void RegisterAndLoginTest()
        {
            driver.Navigate().GoToUrl($"{baseUrl}/register");
            driver.FindElement(By.Id("name")).SendKeys("Teszt Elek");
            driver.FindElement(By.Id("email")).SendKeys("teszt@example.com"); 
            driver.FindElement(By.Id("password")).SendKeys("Tesztjelszo123");
            driver.FindElement(By.Id("confirm-password")).SendKeys("Tesztjelszo123");
            driver.FindElement(By.CssSelector("button[type='submit']")).Click();

            driver.Navigate().GoToUrl($"{baseUrl}/login");
            driver.FindElement(By.Id("email")).SendKeys("teszt@example.com");
            driver.FindElement(By.Id("password")).SendKeys("Tesztjelszo123");
            driver.FindElement(By.CssSelector("button[type='submit']")).Click();


            wait.Until(d => d.Url == $"{baseUrl}/");
            Assert.AreEqual($"{baseUrl}/", driver.Url);

            var logoutButton = wait.Until(driver => driver.FindElement(By.CssSelector("form[action*='logout'] button[type='submit']")));
            Assert.IsNotNull(logoutButton);
        }


        [TearDown]
        public void TearDown()
        {
           
            if (driver != null)
            {
                driver.Quit(); 
                driver.Dispose();
            }
        }
    }
}
