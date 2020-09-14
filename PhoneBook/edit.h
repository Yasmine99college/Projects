void edit_contact()
{
    int counter1 = 0;
    //int counter2 = 0;
    int flag=0;
    char editfirstName[20];
    char editlastName[20];

    printf("\nFirst name: ");
    scanf("%s", editfirstName);
    printf("Last name: ");
    scanf("%s", editlastName);

      for (counter1 = 0; counter1 < count; counter1++)
      {
         if (strcasecmp(editfirstName, myarr[counter1].first_name) == 0)
         {
            if (strcasecmp(editlastName, myarr[counter1].last_name) == 0)
            {
                char new_firstName[20];
                char new_lastName[20];
                char new_phoneNumber[20];
                char new_email [50];
                int new_dayOfBirth;
                int new_monthOfBirth;
                int new_yearOfBirth;
                char new_address[50];
                int choose;

                while(1)
                {
                    printf(" please enter the number according to what you want to modify\n1\t first name\n2\t last name \n3\t phone number\n4\t address \n5\t email \n6\t day of birth\n7\t month of birth\n8\t year of birth \n9\t Done\n" );
                    printf("Your choice: ");
                    scanf("%d",&choose);
                    if (choose==9)
                    {
                        printf("Contact edited\n\n");
                        break;
                    }

                    switch(choose)
                    {
                        case 1:
                        printf("Enter the new first name: ");
                        scanf(" %s",new_firstName);
                        printf("Scanned\n");
                        strcpy(myarr[counter1].first_name,new_firstName);
                        break;

                        case 2:
                        printf("Enter the new last name: ");
                        scanf(" %s",new_lastName);
                        strcpy(myarr[counter1].last_name,new_lastName);
                        break;

                        case 3:printf("Enter the new phone number: ");
                        scanf(" %s",new_phoneNumber);
                        strcpy(myarr[counter1].phone_number,new_phoneNumber);
                        break;

                        case 4:
                        printf("Enter the new address: ");
                        scanf (" %[^\n]s",new_address);
                        strcpy(myarr[counter1].address,new_address);
                        break;

                        case 5:
                        printf("Enter the new email: ");
                        scanf(" %s",new_email);
                        strcpy(myarr[counter1].email,new_email);
                        break;

                        case 6:
                        printf("Enter the new day of birth: ");
                        scanf(" %d",&new_dayOfBirth);
                        myarr[counter1].birthdate.day = new_dayOfBirth;
                        break;

                        case 7:
                        printf("Enter the new month of birth: ");
                        scanf (" %d",&new_monthOfBirth);
                        myarr[counter1].birthdate.month = new_monthOfBirth;
                        break;

                        case 8:
                        printf("Enter the new year of birth: ");
                        scanf(" %d",&new_yearOfBirth);
                        myarr[counter1].birthdate.year = new_yearOfBirth;
                        break;

                    }
                flag=1;
            }
        }

        }

    }
    if (flag==0)
            printf("The contact you entered was not saved before,please try again ");
}