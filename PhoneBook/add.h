void addcontact()
{
    contact input;

    printf("First name: ");
    scanf("%s",input.first_name);
    printf("Last name: ");
    scanf("%s",input.last_name);
    printf("Birthdate\n");
    printf("Day: ");
    scanf("%d",&input.birthdate.day);
    printf("Month: ");
    scanf("%d",&input.birthdate.month);
    printf("Year: ");
    scanf("%d",&input.birthdate.year);
    printf("Address: ");
    getchar();
    gets(input.address);
    printf("Email: ");
    scanf("%s",input.email);
    printf("Phone number: ");
    scanf("%s",input.phone_number);
    myarr[count]= input;
    count++;
}